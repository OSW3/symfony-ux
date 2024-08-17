export function parseBoolean(value, defaults=false) {
    if (value === 'true') {
        return true;
    } else if (value === 'false') {
        return false;
    }
    return defaults;
}
