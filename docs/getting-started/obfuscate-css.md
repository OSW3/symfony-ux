# Obfuscate CSS

Install dependencies

```shell 
npm install dotenv
npm install postcss-loader --save-dev
npm install postcss-modules
```


Add config to `.env`

```shell
## Enable CSS Classes obfuscation
CSS_OBFUSCATION_ENABLED=true
CSS_OBFUSCATION_MAPPING=css-map.json
```


Update `webpack.config.js`

```js 
require('dotenv').config();
const fs = require('fs');
const path = require('path');
const webpack = require('webpack');

const cssClassMapPath = path.resolve(__dirname, process.env.CSS_OBFUSCATION_MAPPING);
const cssClassMap = fs.existsSync(cssClassMapPath) ? JSON.parse(fs.readFileSync(cssClassMapPath, 'utf8')) : {}

Encore 
    // Active le support de PostCSS
    .enablePostCssLoader()

    .addPlugin(
        new webpack.DefinePlugin({
            'cssObfuscationEnabled': process.env.CSS_OBFUSCATION_ENABLED,
            'cssObfuscationMap': JSON.stringify(cssClassMap),
        })
    )
;
```



Add `postcss.config.js`

```js 
require('dotenv').config();
const fs = require('fs');
const path = require('path');
const map = path.resolve(__dirname, process.env.CSS_OBFUSCATION_MAPPING);

if (process.env.CSS_OBFUSCATION_ENABLED === 'true') {
    module.exports = {
        plugins: {
            "postcss-modules": {
                generateScopedName: "[hash:base64:6]",
                getJSON: function (cssFileName, json) {                    
    
                    if (!fs.existsSync(path.dirname(map))) {
                        fs.mkdirSync(path.dirname(map), { recursive: true });
                    }
    
                    if (json && Object.keys(json).length > 0) {
                        fs.writeFileSync(map, JSON.stringify(json, null, 2));
                    }
                }
            }
        }
    };
}
```


Add the listener `src\EventListener\ObfuscateCssListener.php`

```php
namespace App\EventListener;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Filesystem\Path;

class ObfuscateCssListener
{
    #[AsEventListener]
    public function proceed(ResponseEvent $event): void {
        if ($_ENV['CSS_OBFUSCATION_ENABLED'] != 'true') {
            return;
        }
        
        $path    = Path::join(__DIR__, '/../../', $_ENV['CSS_OBFUSCATION_MAPPING']);
        $map     = file_exists($path) ? json_decode(file_get_contents($path), true) ?? [] : [];
        $html    = $event->getResponse()->getContent();
        $crawler = new Crawler($html);

        $crawler->filter('[class]')->each(function (Crawler $node) use ($map) {
            $classes = explode(' ', $node->attr('class'));
            $obfuscatedClasses = [];

            foreach ($classes as $class) {
                $obfuscatedClasses[] = $map[$class] ?? $class;
            }

            $node->getNode(0)->setAttribute('class', implode(' ', $obfuscatedClasses));
        });

        $event->setResponse(new Response($crawler->html()));
    }
}
```