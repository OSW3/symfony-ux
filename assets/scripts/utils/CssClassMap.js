// CSS Mapping
const isNode = typeof process !== 'undefined';
const cssMapping = isNode ? process.env.CSS_MAPPING || {} : {};
const obfuscateCss = isNode ? process.env.OBFUSCATE_CSS_CLASSES : false;

export function getCssClass(className) {
    return obfuscateCss ? cssMapping[className] || className : className;
}