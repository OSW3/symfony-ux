// CSS Mapping
export function getCssClass(className) {    
    return cssObfuscationEnabled ? cssObfuscationMap[className] || className : className;
}