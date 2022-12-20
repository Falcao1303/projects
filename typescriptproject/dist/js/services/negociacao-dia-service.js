import { Negociacao } from "../models/negociacao.js";
export class NegociacaoDiaService {
    obterNegociacoes() {
        return fetch('http://localhost:8080/dados')
            .then(res => res.json())
            .then((dados) => dados.map(dado => new Negociacao(new Date(), dado.vezes, dado.montante)))
            .catch(err => {
            console.log(err);
            throw new Error('Não foi possível importar as negociações');
        });
    }
}
