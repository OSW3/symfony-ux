// import { PREFIX } from "../generated";
import * as generated from "../generated";

export function getPrefix()
{
    let prefix = generated.PREFIX;

    if (prefix.length) {
        prefix+= '-';
    }

    return prefix;
}

export function getData( $const )
{
    return generated[$const] || null;
}
