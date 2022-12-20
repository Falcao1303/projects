import { Imprimivel } from "./imprimivel.js";

export function imprime(...objetos: Imprimivel[]) {
    objetos.forEach(objeto => objeto.paraTexto && console.log(objeto.paraTexto()));
}