import { NegociacaoDia } from "../interface/negociacao-dia.js";
import { Negociacao } from "../models/negociacao.js";

export class NegociacaoDiaService {
    obterNegociacoes(): Promise<Negociacao[]> {
        return fetch('http://localhost:8080/dados')
            .then(res => res.json())
            .then((dados: NegociacaoDia[]) => dados.map(dado => new Negociacao(new Date(), dado.vezes, dado.montante)))
            .catch(err => {
                console.log(err);
                throw new Error('Não foi possível importar as negociações');
            });
    }
}