// CSS Mapping
const cssMapping = process.env.CSS_MAPPING || {};

export function getCssClass(className) {
    return process.env.OBFUSCATE_CSS_CLASSES ? cssMapping[className] || className : className;
}
