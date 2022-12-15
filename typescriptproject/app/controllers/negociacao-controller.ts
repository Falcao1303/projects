import { logTempoExecucao } from "../decorators/log-tempo-execucao.js";
import { Negociacao } from "../models/negociacao.js";
import { Negociacoes } from "../models/negociacoes.js";
import { NegociacoesView } from "../views/negociacoes-view.js";
import { MensagemView } from "../views/mensagem-view.js";
import { DiaDaSemana } from "../enums/dia-da-semana.js";
import { domInject } from "../decorators/domInject.js";

export class NegociacaoController {
    @domInject('#data')
    private inputData: HTMLInputElement;
    @domInject('#quantidade')
    private inputQuantidade: HTMLInputElement;
    @domInject('#valor')
    private inputValor: HTMLInputElement;
    private negociacoes = new Negociacoes();
    private negociacoesView = new NegociacoesView('#negociacoesView');
    private mensagemView = new MensagemView('#mensagemView');

    constructor(){
        this.negociacoesView.update(this.negociacoes);
    }

    @logTempoExecucao() // decorator
    public adiciona(): void {
        const negociacao = Negociacao.criaDe(
            this.inputData.value, 
            this.inputQuantidade.value, 
            this.inputValor.value);
        if (!this.DiaUtil(negociacao.data)) {
            this.mensagemView.update('Somente negociações em dias úteis, por favor!');
            return;
        }
        this.negociacoes.adiciona(negociacao);
        this.limparFormulario();
        this.atualizaView();
    }

    private limparFormulario(): void {
        this.inputData.value = '';
        this.inputQuantidade.value = '1';
        this.inputValor.value = '0.00';
        this.inputData.focus();
    }

    private atualizaView(): void {
        this.negociacoesView.update(this.negociacoes);
        this.mensagemView.update('Negociação adicionada com sucesso!');
    }

    private DiaUtil(data: Date): boolean {
        return data.getDay() > DiaDaSemana.DOMINGO && data.getDay() < DiaDaSemana.SABADO;
    }

}