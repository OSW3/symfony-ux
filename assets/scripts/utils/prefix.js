import { PREFIX } from "../generated";

export function getPrefix()
{
    let prefix = PREFIX;

    if (prefix.length) {
        prefix+= '-';
    }

    return prefix;
}
