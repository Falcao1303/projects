import { Component, OnInit } from '@angular/core';
import { Pensamento } from '../pensamento';

@Component({
  selector: 'app-criar-pensamento',
  templateUrl: './criar-pensamento.component.html',
  styleUrls: ['./criar-pensamento.component.css']
})
export class CriarPensamentoComponent implements OnInit {

  pensamento: Pensamento = {
    id: 5,
    conteudo : 'Pensamento 1',
    autoria : 'Autor 1',
    modelo : ' ',
  }

  constructor() { }

  ngOnInit(): void {
  }

  criarPensamento()  {
    alert("teste" + this.pensamento.conteudo)
  }

  cancelar() {
    alert("teste cancelado")
  }
}
