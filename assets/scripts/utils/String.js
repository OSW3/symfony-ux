export function isEmoji(str) {
    return /\p{Emoji}/u.test(str);
}
export function isCSSVariable(str) {
    return /^--[a-zA-Z0-9-_]+$/.test(str);
}
export function isVarFunction(str) {
    return /^var\(--[a-zA-Z0-9-_]+\)$/.test(str);
}
export function isBase64Image(str) {
    return /^data:image\/(png|jpeg|jpg|gif|webp|svg\+xml);base64,[A-Za-z0-9+/=]+$/.test(str);
}
export function isBase64ImageURL(str) {
    return /^url\(["']?data:image\/(png|jpeg|jpg|gif|webp|svg\+xml);base64,[A-Za-z0-9+/=]+["']?\)$/.test(str);
}
export function isImageURL(str) {
    return /^https?:\/\/.*\.(png|jpe?g|gif|webp|svg)(\?.*)?$/i.test(str);
}
export function isImageURLWithURLFunction(str) {
    return /^url\(["']?(https?:\/\/.*\.(png|jpe?g|gif|webp|svg)(\?.*)?)["']?\)$/i.test(str);
}
