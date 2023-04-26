import { Pensamento } from './../pensamento';
import { Component, OnInit } from '@angular/core';
import { PensamentoService } from '../pensamento.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-excluir-pensamento',
  templateUrl: './excluir-pensamento.component.html',
  styleUrls: ['./excluir-pensamento.component.css']
})
export class ExcluirPensamentoComponent implements OnInit {

  constructor(
    private service: PensamentoService,
    private router: Router,
    private route: ActivatedRoute) { }

  pensamento: Pensamento = {
    id: 0,
    conteudo: '',
    autoria: '',
    modelo: '',
    favorito: false
  }

  ngOnInit(): void {
    const id = this.route.snapshot.paramMap.get('id')
    this.service.buscarPorId(parseInt(id!)).subscribe((Pensamento) => {
      this.pensamento = Pensamento
    })
  }

  excluirPensamento() {
    if(this.pensamento.id) {
        this.service.excluir(this.pensamento.id).subscribe(() => {
            this.router.navigate(['/listarPensamento'])
        })
    }
  }

  cancelar() {
    this.router.navigate(['/listarPensamento'])
  }

}
