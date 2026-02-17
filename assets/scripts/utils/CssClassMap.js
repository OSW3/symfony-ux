// CSS Mapping
export function getCssClass(className) {

    if (typeof cssObfuscationEnabled === 'undefined' || typeof cssObfuscationMap === 'undefined') {
        return className;
    }

    if (!cssObfuscationEnabled) {
        return className;
    }

    if (!cssObfuscationMap) {
        return className;
    }

    if (!cssObfuscationMap[className]) {
        return className;
    }

    return cssObfuscationMap[className] || className;
}