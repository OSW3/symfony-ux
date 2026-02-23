# builder

## Structure

### Box Model 

#### Width

```scss
@include width(320px);             // width: 320px;
@include width(100, true);         // width: 100px !important;

@include min-width(240px);         // min-width: 240px;
@include max-width(1200px);        // max-width: 1200px;

@include width-auto();             // width: auto;
@include width-full();             // width: 100%;
@include width-fit();              // width: fit-content;
@include width-min-content();      // width: min-content;
@include width-max-content(true);  // width: max-content !important;
```

#### Height

```scss
@include height(48px);             // height: 48px;
@include height(10, true);         // height: 10px !important;

@include min-height(320px);        // min-height: 320px;
@include max-height(90vh);         // max-height: 90vh;

@include height-auto();            // height: auto;
@include height-fit();             // height: fit-content;
@include height-min-content();     // height: min-content;
@include height-max-content(true); // height: max-content !important;
```


#### Viewport

```scss
@include viewport(100, 100);       // width: 100vw; width: 100dvw; height: 100vh; height: 100dvh;
@include width-viewport(100);      // width: 100vw; width: 100dvw;
@include height-viewport(100);     // height: 100vh; height: 100dvh;

@include viewport(100, 100, true); // même sortie avec !important
```

#### Raccourcis de taille

```scss
@include size(320px, 200px);       // width: 320px; height: 200px;
@include min-size(240px, 120px);   // min-width: 240px; min-height: 120px;
@include max-size(1200px, 80vh);   // max-width: 1200px; max-height: 80vh;

@include square(48px);             // width: 48px; height: 48px;
@include content-size();           // width: max-content; height: auto;
@include size-auto();              // width: auto; height: auto;
@include full-size(true);          // width: 100% !important; height: 100% !important;
```


#### Box Sizing

```scss
@include box-sizing(border-box);         // box-sizing: border-box;
@include box-sizing(content-box, true);  // box-sizing: content-box !important;
```


### Display 

```scss
@include display(block, true);         // display: block !important;
@include display-block();              // display: block;
@include display-inline();             // display: inline;
@include display-inline-block();       // display: inline-block;
@include display-inline-flex();        // display: inline-flex;
@include display-none();               // display: none;
@include display-contents();           // display: contents;
@include display-flex();               // display: flex;
@include display-flex(inline);         // display: inline-flex;
@include display-flex(inline-flex);    // display: inline-flex;
@include display-grid();               // display: grid;
@include display-grid(inline);         // display: inline-grid;
@include display-grid(inline-grid);    // display: inline-grid;
@include display-list();               // display: list-item;
@include display-table();              // display: table;
@include display-table(inline);        // display: inline-table;
@include display-table(inline-table);  // display: inline-table;
@include display-table(row);           // display: table-row;
@include display-table(table-row);     // display: table-row;
@include display-table(cell);          // display: table-cell;
@include display-table(table-cell);    // display: table-cell;
@include display-ruby();               // display: ruby;
@include display-ruby(inline);         // display: inline-ruby;
@include display-ruby(inline-ruby);    // display: inline-ruby;
@include display-ruby(base);           // display: ruby-base;
@include display-ruby(ruby-base);      // display: ruby-base;
@include display-ruby(text);           // display: ruby-text;
@include display-ruby(ruby-text);      // display: ruby-text;
@include display-ruby(group);          // display: ruby-group;
@include display-ruby(ruby-group);     // display: ruby-group;
@include display-flow-root();          // display: flow-root;
```


### Position 

```scss
@include position(relative);           // position: relative;
@include position-static();            // position: static;
@include position-relative();          // position: relative;
@include position-absolute();          // position: absolute;
@include position-fixed();             // position: fixed;
@include position-sticky();            // position: sticky;
@include position-static();            // position: static;

@include top(10);                      // top: 10px;
@include right(10);                    // right: 10px;
@include bottom(10);                   // bottom: 10px;
@include left(10);                     // left: 10px;
@include z-index(10);                  // z-index: 10;

@include inset(10px);                  // top: 10px; right: 10px; bottom: 10px; left: 10px;
@include inset(10px 20px);             // top: 10px; right: 20px; bottom: 10px; left: 20px;
@include inset(10px 20px 30px);        // top: 10px; right: 20px; bottom: 30px; left: 20px;
@include inset(10px 20px 30px 40px);   // top: 10px; right: 20px; bottom: 30px; left: 40px;
@include inset(10px auto);             // top: 10px; right: auto; bottom: 10px; left: auto;
@include inset(10px auto, true);       // top: 10px !important; right: auto !important; bottom: 10px !important; left: auto !important;

@include inset-inline(10px);           // inset-inline: 10px;
@include inset-block(10px);            // inset-block: 10px;
@include inset-inline-start(10px);     // inset-inline-start: 10px;
@include inset-inline-end(10px);       // inset-inline-end: 10px;
@include inset-block-start(10px);      // inset-block-start: 10px;
@include inset-block-end(10px);        // inset-block-end: 10px;  
```

## Rendering 

```scss
@include contain(none);                          // contain: none;
@include contain(strict);                        // contain: strict;
@include contain(content);                       // contain: content;
@include contain(size);                          // contain: size;
@include contain(inline-size);                   // contain: inline-size;
@include contain(layout);                        // contain: layout;
@include contain(paint);                         // contain: paint;
@include contain(style);                         // contain: style;
@include contain(layout);                        // contain: layout;
@include contain(size paint);                    // contain: size paint;

@include contain-size();                         // contain: size;
@include contain-inline-size();                  // contain: inline-size;
@include contain-layout();                       // contain: layout;
@include contain-paint();                        // contain: paint;
@include contain-style();                        // contain: style;
@include contain-content();                      // contain: content;

@include cv-auto(10 400);                        // font-variant: cv(10, 400);

@include content-visibility('visible');          // content-visibility: visible;
@include content-visibility('auto');             // content-visibility: auto;
@include content-visibility('hidden');           // content-visibility: hidden;
@include contain-intrinsic-size('10px');         // contain-intrinsic-size: 10px;
@include contain-intrinsic-size('auto 10px');    // contain-intrinsic-size: auto 10px;
@include contain-intrinsic-size('10px 20px');    // contain-intrinsic-size: 10px 20px;
@include contain-intrinsic-size('auto 10px 20px');// contain-intrinsic-size: auto 10px 20px;
```

### Scroll

```scss
@include scrollbar-gutter(auto);               // scrollbar-gutter: auto;
@include scrollbar-gutter(stable);             // scrollbar-gutter: stable;
@include scrollbar-gutter(stable both-edges);  // scrollbar-gutter: stable both-edges;

@include overscroll-behavior(auto);            // overscroll-behavior: auto;
@include overscroll-behavior(contain);         // overscroll-behavior: contain;
@include overscroll-behavior(none);            // overscroll-behavior: none;
@include overscroll-behavior(auto none);       // overscroll-behavior: auto none;
@include overscroll-behavior(contain auto);    // overscroll-behavior: contain auto;

@include overscroll-behavior-x(auto);          // overscroll-behavior-x: auto;
@include overscroll-behavior-y(auto);          // overscroll-behavior-y: auto;
```



## Layout

### Flex 

```scss
@include flex(1 0 auto);                         // flex: 1 0 auto;

@include flex-direction(row);                    // flex-direction: row;
@include flex-direction(row-reverse);            // flex-direction: row-reverse;
@include flex-direction(column);                 // flex-direction: column;
@include flex-direction(column-reverse);         // flex-direction: column-reverse;

@include flex-wrap(nowrap);                      // flex-wrap: nowrap;
@include flex-wrap(wrap);                        // flex-wrap: wrap;
@include flex-wrap(wrap-reverse);                // flex-wrap: wrap-reverse;

@include flex-grow(0);                           // flex-grow: 0;
@include flex-grow(1);                           // flex-grow: 1;

@include flex-shrink(0);                         // flex-shrink: 0;
@include flex-shrink(1);                         // flex-shrink: 1;

@include flex-basis(100px);                      // flex-basis: 100px;
@include flex-basis(100);                        // flex-basis: 100px;
@include flex-basis(auto);                       // flex-basis: auto;
@include flex-basis(content);                    // flex-basis: content;

@include flex-justify-content(flex-start);       // justify-content: flex-start;
@include flex-justify-content(flex-end);         // justify-content: flex-end;
@include flex-justify-content(center);           // justify-content: center;
@include flex-justify-content(space-between);    // justify-content: space-between;
@include flex-justify-content(space-around);     // justify-content: space-around;
@include flex-justify-content(space-evenly);     // justify-content: space-evenly;

@include flex-align-items(flex-start);           // align-items: flex-start;
@include flex-align-items(flex-end);             // align-items: flex-end;
@include flex-align-items(center);               // align-items: center;
@include flex-align-items(baseline);             // align-items: baseline;
@include flex-align-items(stretch);              // align-items: stretch;

@include flex-align-content(flex-start);         // align-content: flex-start;
@include flex-align-content(flex-end);           // align-content: flex-end;
@include flex-align-content(center);             // align-content: center;
@include flex-align-content(space-between);      // align-content: space-between;
@include flex-align-content(space-around);       // align-content: space-around;
@include flex-align-content(stretch);            // align-content: stretch;

@include flex-align-self(auto);                  // align-self: auto;
@include flex-align-self(flex-start);            // align-self: flex-start;
@include flex-align-self(flex-end);              // align-self: flex-end;
@include flex-align-self(center);                // align-self: center;
@include flex-align-self(baseline);              // align-self: baseline;
@include flex-align-self(stretch);               // align-self: stretch;

@include flex-order(0);                          // order: 0;
@include flex-order(1);                          // order: 1;
@include flex-order(2);                          // order: 2;
@include flex-order(3);                          // order: 3;

@include flex-container(
    $display: flex,
    $direction: row,
    $wrap: wrap,
    $justify: center,
    $align-items: center,
    $align-content: center,
    $gap: 10px,
    $row-gap: 10px,
    $column-gap: 10px,
    $important: false
); // display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; align-content: center; gap: 10px; row-gap: 10px; column-gap: 10px;
```

### Grid

```scss
@include grid("auto 1fr / 2fr 1fr");  // grid-template: auto 1fr / 2fr 1fr;

@include grid-template-columns(100px 1fr 2fr);   // grid-template-columns: 100px 1fr 2fr;
@include grid-template-columns(repeat(3, 1fr));  // grid-template-columns: repeat(3, 1fr);

@include grid-template-rows(100px 1fr 2fr);   // grid-template-rows: 100px 1fr 2fr;
@include grid-template-rows(repeat(3, 1fr));  // grid-template-rows: repeat(3, 1fr);

@include grid-template-areas("header header header" "sidebar content content" "footer footer footer"); // grid-template-areas: "header header header" "sidebar content content" "footer footer footer";

@include grid-auto-flow(row dense);  // grid-auto-flow: row dense;
@include grid-auto-flow(column);     // grid-auto-flow: column;

@include grid-auto-columns(100px);  // grid-auto-columns: 100px;
@include grid-auto-columns(1fr);    // grid-auto-columns: 1fr;

@include grid-auto-rows(100px);  // grid-auto-rows: 100px;
@include grid-auto-rows(1fr);    // grid-auto-rows: 1fr;

@include grid-place-items(center);     // place-items: center;
@include grid-place-items(start end);  // place-items: start end;

@include grid-place-content(center);     // place-content: center;
@include grid-place-content(start end);  // place-content: start end;

@include grid-column(header);   // grid-column: header;
@include grid-column("1 / 3");  // grid-column: 1 / 3;
@include grid-column(span 2);   // grid-column: span 2;

@include grid-column-start(header);  // grid-column-start: header;
@include grid-column-start(1);       // grid-column-start: 1;

@include grid-column-end(header);  // grid-column-end: header;
@include grid-column-end(3);       // grid-column-end: 3;

@include grid-row(header);   // grid-row: header;
@include grid-row("1 / 3");  // grid-row: 1 / 3;
@include grid-row(span 2);   // grid-row: span 2;

@include grid-row-start(header);  // grid-row-start: header;
@include grid-row-start(1);       // grid-row-start: 1;

@include grid-row-end(header);  // grid-row-end: header;
@include grid-row-end(3);       // grid-row-end: 3;

@include place-self(center);     // place-self: center;
@include place-self(start end);  // place-self: start end;

@include justify-self(center);  // justify-self: center;
@include justify-self(start);   // justify-self: start;

@include align-self(center);  // align-self: center;
@include align-self(start);   // align-self: start;

@include grid-area(header);  // grid-area: header;
```

### Gaps 

```scss
@include gap(10px);                              // gap: 10px;
@include gap(10);                                // gap: 10px;
@include row-gap(10px);                          // row-gap: 10px;
@include row-gap(10);                            // row-gap: 10px;
@include column-gap(10px);                       // column-gap: 10px;
@include column-gap(10);                         // column-gap: 10px;
```

## Typography

### Font

```scss
@include font-family('Open Sans', sans-serif, true); // font-family: "Open Sans", sans-serif !important;
@include font-size(16px);                             // font-size: 16px;
@include font-weight(400, true);                      // font-weight: 400 !important;
@include font-style(italic);                          // font-style: italic;
@include font-stretch(normal);                        // font-stretch: normal;
@include font-variant(normal);                        // font-variant: normal;
```

### Line & spacing

```scss
@include line-height(1.5);     // line-height: 1.5;
@include letter-spacing(2px);  // letter-spacing: 2px;
@include letter-spacing(2);    // letter-spacing: 2px;
@include word-spacing(10px);   // word-spacing: 10px;
```

### Text behavior

```scss
@include text-align(center, true);            // text-align: center !important;
@include text-transform(uppercase);           // text-transform: uppercase;
@include text-decoration(underline overline); // text-decoration: underline overline;
@include text-indent(20px);                   // text-indent: 20px;
@include white-space(pre-line);               // white-space: pre-line;
@include word-break(break-all, true);         // word-break: break-all !important;
@include overflow-wrap(break-word, true);     // overflow-wrap: break-word !important;
@include hyphens(auto);                       // hyphens: auto;
```

### Text decoration & fine control

```scss
@include text-decoration-color(red);              // text-decoration-color: red;
@include text-decoration-thickness(2px);          // text-decoration-thickness: 2px;
@include text-underline-offset(2px);              // text-underline-offset: 2px;
@include text-underline-position(under, true);    // text-underline-position: under !important;
@include tab-size(4);                             // tab-size: 4;
@include text-wrap(normal);                       // text-wrap: normal;
@include text-size-adjust(auto, true);            // text-size-adjust: auto !important;
@include quotes('"«' '»"' '"‹' '›"');            // quotes: "«" "»" "‹" "›";
```

## Spacing
```scss
@include padding(10px 20px);             // padding: 10px 20px;
@include padding-top(10px);              // padding-top: 10px;
@include padding-right(20px);            // padding-right: 20px;
@include padding-bottom(10px);           // padding-bottom: 10px;
@include padding-left(20px);             // padding-left: 20px;

@include padding-x(20px);                // padding-right: 20px; padding-left: 20px;
@include padding-y(10px);                // padding-top: 10px; padding-bottom: 10px;

@include padding-inline(20px);           // padding-inline: 20px;
@include padding-inline-start(20px);     // padding-inline-start: 20px;
@include padding-inline-end(20px);       // padding-inline-end: 20px;
@include padding-block(10px);            // padding-block: 10px;
@include padding-block-start(10px);      // padding-block-start: 10px;
@include padding-block-end(10px);        // padding-block-end: 10px;

@include margin(10px 20px);              // margin: 10px 20px;
@include margin-top(10px);               // margin-top: 10px;
@include margin-right(20px);             // margin-right: 20px;
@include margin-bottom(10px);            // margin-bottom: 10px;
@include margin-left(20px);              // margin-left: 20px;

@include margin-x(20px);                 // margin-right: 20px; margin-left: 20px;
@include margin-y(10px);                 // margin-top: 10px; margin-bottom: 10px;

@include margin-inline(20px);            // margin-inline: 20px;
@include margin-inline-start(20px);      // margin-inline-start: 20px;
@include margin-inline-end(20px);        // margin-inline-end: 20px;
@include margin-block(10px);             // margin-block: 10px;
@include margin-block-start(10px);       // margin-block-start: 10px;
@include margin-block-end(10px);         // margin-block-end: 10px;
```


## Interactions

```scss
@include cursor(pointer);                        // cursor: pointer;
@include cursor(auto);                           // cursor: auto;
@include cursor(default);                        // cursor: default;
@include cursor(text);                           // cursor: text;
@include cursor(move);                           // cursor: move;
@include cursor(not-allowed);                    // cursor: not-allowed;
@include cursor(grab);                           // cursor: grab;
@include cursor(grabbing);                       // cursor: grabbing;
@include cursor(wait);                           // cursor: wait;
@include cursor(help);                           // cursor: help;
@include cursor(url('cursor.png'), pointer);     // cursor: url('cursor.png'), pointer;
@include cursor(pointer, true);                  // cursor: pointer !important;

@include user-select(none);                      // user-select: none;
@include user-select(text);                      // user-select: text;
@include user-select(all);                       // user-select: all;
@include user-select(auto);                      // user-select: auto;
@include user-select(text, true);                // user-select: text !important;

@include user-drag(none);                        // user-drag: none;
@include user-drag(auto);                        // user-drag: auto;
@include user-drag(element);                     // user-drag: element;
@include user-drag(element, true);               // user-drag: element !important;

@include pointer-events(auto);                   // pointer-events: auto;
@include pointer-events(none);                   // pointer-events: none;
@include pointer-events(visiblePainted);         // pointer-events: visiblePainted;
@include pointer-events(visibleFill);            // pointer-events: visibleFill;
@include pointer-events(visibleStroke);          // pointer-events: visibleStroke;
@include pointer-events(visible);                // pointer-events: visible;
@include pointer-events(painted);                // pointer-events: painted;
@include pointer-events(fill);                   // pointer-events: fill;
@include pointer-events(stroke);                 // pointer-events: stroke;
@include pointer-events(all);                    // pointer-events: all;
@include pointer-events(none, true);             // pointer-events: none !important;

@include touch-action(auto);                     // touch-action: auto;
@include touch-action(none);                     // touch-action: none;
@include touch-action(manipulation);             // touch-action: manipulation;
@include touch-action(pan-x);                    // touch-action: pan-x;
@include touch-action(pan-y);                    // touch-action: pan-y;
@include touch-action(pan-x pan-y);              // touch-action: pan-x pan-y;

@include touch-callout(none);                    // -webkit-touch-callout: none;
@include touch-callout(default);                 // -webkit-touch-callout: default;
@include touch-callout(inherit);                 // -webkit-touch-callout: inherit;

@include outline(1px solid red);                 // outline: 1px solid red;
@include outline(2px dashed blue, true);         // outline: 2px dashed blue !important;
@include outline-offset(5px);                    // outline-offset: 5px;
@include outline-offset(-2px, true);             // outline-offset: -2px !important;

@include tap-highlight-color(transparent);      // -webkit-tap-highlight-color: transparent;
@include tap-highlight-color(rgba(0, 0, 0, 0.1)); // -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
```


### State
```scss
```scss
@include states-decls((
    color: (base: var(--c), hover: var(--c-hover)),
    'background-color': (base: var(--bg), focus: var(--bg-focus))
), (selector: '&'));
// color: var(--c); 
// &:hover { color: var(--c-hover); }
// background-color: var(--bg);
// &:focus { background-color: var(--bg-focus); }

@include color-states((base: #222, hover: #000)); 
// color: #222;
// &:hover { color: #000; }

@include caret-color-states((base: #222, hover: #000)); 
// caret-color: #222;
// &:hover { caret-color: #000; }

@include accent-color-states((base: #222, hover: #000)); 
// accent-color: #222;
// &:hover { accent-color: #000; }

@include text-decoration-color-states((base: #222, hover: #000)); 
// text-decoration-color: #222;
// &:hover { text-decoration-color: #000; }

@include text-emphasis-color-states((base: #222, hover: #000)); 
// text-emphasis-color: #222;
// &:hover { text-emphasis-color: #000; }

@include text-shadow-states((base: none, hover: 1px 1px 2px #000)); 
// text-shadow: none;
// &:hover { text-shadow: 1px 1px 2px #000; }

@include text-stroke-color-states((base: #222, hover: #000)); 
// -webkit-text-stroke-color: #222;
// &:hover { -webkit-text-stroke-color: #000; }

@include background-color-states((base: #fff, hover: #eee));
// background-color: #fff;
// &:hover { background-color: #eee; }

@include background-color-states((base: #fff, hover: #eee), (selector: '&:STATE')); 
// background-color: #fff;
// &:hover { background-color: #eee; }

@include background-states((base: #fff url(img.png) no-repeat, hover: #eee url(img-hover.png) repeat));
// background: #fff url(img.png) no-repeat;
// &:hover { background: #eee url(img-hover.png) repeat; }

@include background-image-states((base: url(img.png), hover: url(img-hover.png)));
// background-image: url(img.png);
// &:hover { background-image: url(img-hover.png); }

@include background-position-states((base: '0 0', hover: '10px 10px'));
// background-position: 0 0;
// &:hover { background-position: 10px 10px; }

@include background-size-states((base: 'auto', hover: 'cover'));
// background-size: auto;
// &:hover { background-size: cover; }

@include background-repeat-states((base: 'no-repeat', hover: 'repeat-x'));
// background-repeat: no-repeat;
// &:hover { background-repeat: repeat-x; }

@include background-attachment-states((base: 'scroll', hover: 'fixed'));
// background-attachment: scroll;
// &:hover { background-attachment: fixed; }

@include background-clip-states((base: 'border-box', hover: 'padding-box'));
// background-clip: border-box;
// &:hover { background-clip: padding-box; }

@include background-origin-states((base: 'border-box', hover: 'padding-box'));
// background-origin: border-box;
// &:hover { background-origin: padding-box; }

@include border-color-states((base: #ccc, focus: #999));
// border-color: #ccc;
// &:focus { border-color: #999; }

@include border-width-states((base: '1px', focus: '2px'));
// border-width: 1px;
// &:focus { border-width: 2px; }

@include border-style-states((base: 'solid', focus: 'dashed'));
// border-style: solid;
// &:focus { border-style: dashed; }

@include border-radius-states((base: '4px', focus: '8px'));
// border-radius: 4px;
// &:focus { border-radius: 8px; }

@include border-top-color-states((base: #ccc, focus: #999));
// border-top-color: #ccc;
// &:focus { border-top-color: #999; }

@include border-right-color-states((base: #ccc, focus: #999));
// border-right-color: #ccc;
// &:focus { border-right-color: #999; }

@include border-bottom-color-states((base: #ccc, focus: #999));
// border-bottom-color: #ccc;
// &:focus { border-bottom-color: #999; }

@include border-left-color-states((base: #ccc, focus: #999));
// border-left-color: #ccc;
// &:focus { border-left-color: #999; }

@include outline-color-states((base: #222, hover: #000));
// outline-color: #222;
// &:hover { outline-color: #000; }

@include outline-width-states((base: '1px', hover: '2px'));
// outline-width: 1px;
// &:hover { outline-width: 2px; }

@include outline-style-states((base: 'solid', hover: 'dashed'));
// outline-style: solid;
// &:hover { outline-style: dashed; }

@include outline-states((base: '1px solid #222', hover: '2px dashed #000'));
// outline: 1px solid #222;
// &:hover { outline: 2px dashed #000; }

@include fill-states((base: #000, hover: #555));
// fill: #000;
// &:hover { fill: #555; }

@include stroke-states((base: #000, hover: #555));
// stroke: #000;
// &:hover { stroke: #555; }

@include stroke-width-states((base: '1px', hover: '2px'));
// stroke-width: 1px;
// &:hover { stroke-width: 2px; }

@include opacity-states((base: 1, hover: 0.8));
// opacity: 1;
// &:hover { opacity: 0.8; }

@include box-shadow-states((base: 'none', hover: '0 4px 6px rgba(0,0,0,0.1)'));
// box-shadow: none;
// &:hover { box-shadow: 0 4px 6px rgba(0,0,0,0.1); }

@include filter-states((base: 'none', hover: 'blur(5px)'));
// filter: none;
// &:hover { filter: blur(5px); }

@include backdrop-filter-states((base: 'none', hover: 'blur(5px)'));
// backdrop-filter: none;
// &:hover { backdrop-filter: blur(5px); }

@include mix-blend-mode-states((base: 'normal', hover: 'multiply'));
// mix-blend-mode: normal;
// &:hover { mix-blend-mode: multiply; }

@include isolation-states((base: 'auto', hover: 'isolate'));
// isolation: auto;
// &:hover { isolation: isolate; }

@include cursor-states((base: 'default', hover: 'pointer'));
// cursor: default;
// &:hover { cursor: pointer; }

@include pointer-events-states((base: 'auto', hover: 'none'));
// pointer-events: auto;
// &:hover { pointer-events: none; }

@include user-select-states((base: 'auto', hover: 'none'));
// user-select: auto;
// &:hover { user-select: none; }

@include touch-action-states((base: 'auto', touch-drag: 'pan-x pinch-zoom'));
// touch-action: auto;
// @supports (touch-action: pan-x) {
//   &:touch-drag { touch-action: pan-x pinch-zoom; }
// }

@include display-states((base: 'block', hover: 'none'));
// display: block;
// &:hover { display: none; }

@include visibility-states((base: 'visible', hover: 'hidden'));
// visibility: visible;
// &:hover { visibility: hidden; }
```

### Transition

```scss
@include transition((opacity 200ms ease, transform 300ms));                  // transition: opacity 200ms ease, transform 300ms;
@include transition((opacity 200ms ease, transform 300ms), true);            // transition: opacity 200ms ease, transform 300ms !important;

@include transition-ease(opacity, 200, ease);                                 // transition: opacity 200ms ease;
@include transition-ease(opacity, 200, ease, true);                           // transition: opacity 200ms ease !important;

@include transition-property((opacity, transform));                           // transition-property: opacity, transform;
@include transition-property((opacity, transform), true);                     // transition-property: opacity, transform !important;

@include transition-duration((200, 300ms));                                   // transition-duration: 200ms, 300ms;
@include transition-duration((200, 300ms), true);                             // transition-duration: 200ms, 300ms !important;

@include transition-delay((100, 200ms));                                      // transition-delay: 100ms, 200ms;
@include transition-delay((100, 200ms), true);                                // transition-delay: 100ms, 200ms !important;

@include transition-timing-function((ease, linear));                          // transition-timing-function: ease, linear;
@include transition-timing-function((ease, linear), true);                    // transition-timing-function: ease, linear !important;

@include transition-none();                                                   // transition: none;
@include transition-none(true);                                               // transition: none !important;

@include transition-set((opacity, transform), 200, ease);                     // transition: opacity 200ms ease, transform 200ms ease;
@include transition-set((opacity, transform), 200, ease, true);               // transition: opacity 200ms ease, transform 200ms ease !important;

@include transition-vars((opacity, transform), 200, ease, 100ms);             // transition: opacity 200ms ease 100ms, transform 200ms ease 100ms;
@include transition-vars((opacity, transform), 200, ease, 100ms, true);       // transition: opacity 200ms ease 100ms, transform 200ms ease 100ms !important;
```

## Animation
```scss
    // -- ---------------------------------------------
    // -- Define the animation effects for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-animation() {

    // Propriétés
    // - animation
    // - animation-name
    // - animation-duration
    // - animation-delay
    // - animation-timing-function
    // - animation-iteration-count
    // - animation-direction
    // - animation-fill-mode
    // - animation-play-state
    // - @keyframes

    @content;
}
```

## Theme
```scss
// -- ---------------------------------------------
// -- Define the theme for the xxx component.
// -- ---------------------------------------------
@mixin xxx-theme() {

    // Propriétés
    // - color
    // - background-color
    // - background-image / size / position / repeat
    // - border-color
    // - border-width
    // - border-style
    // - border-radius
    // - outline-color
    // - box-shadow
    // - text-shadow
    // - caret-color
    // - accent-color

    // Background fine control
    // - background-clip
    // - background-origin

    // Borders (avancés, rarement utilisés)
    // - border-image-source
    // - border-image-slice
    // - border-image-outset
    // - border-image-repeat

    // UA reset
    // - appearance

    @content;
}
```

## Effects
```scss
    // -- ---------------------------------------------
    // -- Define the effects for the xxx component.
    // -- ---------------------------------------------
    @mixin xxx-effects() {

    // Propriétés
    // - opacity
    // - filter
    // - backdrop-filter
    // - mix-blend-mode
    // - isolation

    // Transform & 3D
    // - transform
    // - transform-origin
    // - transform-style
    // - perspective
    // - perspective-origin
    // - backface-visibility
    // (ou propriétés individuelles modernes: translate / rotate / scale)

    @content;
}
```










### Grid - Exemples contextuels

#### 1. Layout principal (Header, Sidebar, Content, Footer)

```scss
.app-layout {
    @include display-grid();
    @include grid-template-columns(250px 1fr);
    @include grid-template-rows(auto 1fr auto);
    @include grid-template-areas(
        "header header"
        "sidebar content"
        "footer footer"
    );
    @include height-viewport(100);
    @include gap(0);

    .header {
        @include grid-area(header);
    }

    .sidebar {
        @include grid-area(sidebar);
    }

    .content {
        @include grid-area(content);
    }

    .footer {
        @include grid-area(footer);
    }
}
```

#### 2. Galerie d'images responsive (auto-fit)

```scss
.image-gallery {
    @include display-grid();
    @include grid-template-columns(repeat(auto-fit, minmax(200px, 1fr)));
    @include gap(16px);
    @include padding(20px);

    .gallery-item {
        @include square(100%);
        @include border-radius(8px);
        overflow: hidden;
    }
}
```

#### 3. Dashboard avec widgets de tailles variées

```scss
.dashboard {
    @include display-grid();
    @include grid-template-columns(repeat(12, 1fr));
    @include grid-auto-rows(100px);
    @include gap(20px);

    .widget-large {
        @include grid-column("span 8");
        @include grid-row("span 2");
    }

    .widget-medium {
        @include grid-column("span 4");
        @include grid-row("span 2");
    }

    .widget-small {
        @include grid-column("span 3");
        @include grid-row("span 1");
    }
}
```

#### 4. Form layout avec labels alignés

```scss
.form-grid {
    @include display-grid();
    @include grid-template-columns(150px 1fr);
    @include row-gap(16px);
    @include column-gap(24px);
    @include grid-place-items(start stretch);

    label {
        @include justify-self(end);
        @include align-self(center);
        font-weight: 600;
    }

    input,
    textarea,
    select {
        @include width-full();
    }

    .form-actions {
        @include grid-column("2 / 3");
        @include justify-self(start);
        @include gap(12px);
    }
}
```







### States example 

```scss 

// 1) Simple : une propriété
.button {
  @include color-states((
    base: var(--btn-fg),
    hover: var(--btn-fg-hover),
    disabled: (var(--btn-fg-disabled), true) // important par état
  ), (
    selector: '&', // par défaut
  ));
}

// 2) Template avec position STATE au milieu (liens dans un nav)
.nav-item {
  // '&:STATE > a' deviendra '& > a' (base) ou '&:hover > a' (hover), etc.
  @include states('color', (
    base: var(--nav),
    hover: var(--nav-hover),
    focus-visible: var(--nav-focus)
  ), (
    selector: '&:STATE > a'
  ));
}

// 3) Plusieurs propriétés d’un coup
.card {
  @include states-decls((
    color: (
      base: var(--card-fg),
      hover: var(--card-fg-hover)
    ),
    'background-color': (
      base: var(--card-bg),
      focus-within: var(--card-bg-focus)
    ),
    'border-color': (
      base: var(--card-bd),
      hover: (var(--card-bd-hover), true) // important pour hover seulement
    )
  ), (selector: '&'));
}

// 4) Wrapper media (forced-colors + dark)
.tag {
  @include states('border-color', (
    base: var(--bd),
    hover: var(--bd-hover)
  ), (
    selector: '&',
    forced-colors: true,
    scheme: dark
  ));
}
``` 

