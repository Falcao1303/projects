import { logTempoExecucao } from "../decorators/log-tempo-execucao.js";
import { Negociacao } from "../models/negociacao.js";
import { Negociacoes } from "../models/negociacoes.js";
import { NegociacoesView } from "../views/negociacoes-view.js";
import { MensagemView } from "../views/mensagem-view.js";
import { DiaDaSemana } from "../enums/dia-da-semana.js";
import { domInject } from "../decorators/domInject.js";
import { NegociacaoDiaService } from "../services/negociacao-dia-service.js";

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
    private servico = new NegociacaoDiaService();

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
        console.log(
            `Data: ${negociacao.data}
            Quantidade: ${negociacao.quantidade}
            Valor: ${negociacao.valor}`);
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

    importarDados(): void {
        this.servico.obterNegociacoes()
        .then(negociacoes => {
            negociacoes.forEach(negociacao => this.negociacoes.adiciona(negociacao));
            this.negociacoesView.update(this.negociacoes);
        });
    }

}