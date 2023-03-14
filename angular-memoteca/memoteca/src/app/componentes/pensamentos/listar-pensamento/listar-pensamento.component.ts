import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-listar-pensamento',
  templateUrl: './listar-pensamento.component.html',
  styleUrls: ['./listar-pensamento.component.css']
})
export class ListarPensamentoComponent implements OnInit {

  listaPensamentos = [
    {
      conteudo: 'Angular comunicação',
      autoria: 'Lucas',
      modelo: 'modelo3'
    },
    {
      conteudo: 'Angular comunicação 2',
      autoria: 'Lucas',
      modelo: 'modelo2'
    },
    {
      conteudo: 'Angular comunicação 22',
      autoria: 'Lucas',
      modelo: 'modelo1'
    }
  ];
  constructor() { }

  ngOnInit(): void {
  }

}
