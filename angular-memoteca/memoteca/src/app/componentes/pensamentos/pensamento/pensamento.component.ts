import { Component, Input, OnInit } from '@angular/core';
import { Pensamento } from '../pensamento';
import { PensamentoService } from '../pensamento.service';

@Component({
  selector: 'app-pensamento',
  templateUrl: './pensamento.component.html',
  styleUrls: ['./pensamento.component.css']
})
export class PensamentoComponent implements OnInit {
  @Input() pensamento: Pensamento = {
    id: 0 ,
    conteudo: 'I love Angular',
    autoria: 'Nay',
    modelo: 'modelo3',
    favorito: false
}

  constructor(private service: PensamentoService ) { }

  @Input() listaFavoritos: Pensamento[] = [];

  ngOnInit(): void {
  }

  larguraPensamento(): string {
    if(this.pensamento.conteudo.length >=256) {
        return 'pensamento-g'
    }
    return 'pensamento-p'
  }

  mudarIconeFavorito(): string {
    if(this.pensamento.favorito) {
      return 'ativo'
    }
    return 'inativo'
  }

  atualizarFavoritos(): void {
    this.service.favoritar(this.pensamento).subscribe(
      () => {
        this.listaFavoritos.splice(this.listaFavoritos.indexOf(this.pensamento), 1)
      }
    )
  }

}
