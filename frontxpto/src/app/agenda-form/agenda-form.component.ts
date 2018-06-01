import { Component, OnInit } from '@angular/core';
import { ListaServiceService } from '../lista-service.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-agenda-form',
  templateUrl: './agenda-form.component.html',
  styleUrls: ['./agenda-form.component.css']
})
export class AgendaFormComponent implements OnInit {
  public button='Registrar';
  agenda= {

    id:'',
    nome:'',
    nascimento:'',
    email:'',
    telefone_celular:'',
    telefone_residencial:'',
    cep:'',
    rua:'',
    complemento:'',
    numero:'',
    bairro:'',
    cidade:'',
    estado:'',
    pais:'',
  }

  constructor(private agendaHttp: ListaServiceService, private route: ActivatedRoute) {


   }


  ngOnInit() {
    this.route.params.subscribe(
      params => {
        this.agenda.id =params.id;
      });

    if(this.agenda.id >= '1'){
      this.showAgenda(this.agenda.id);
    }
  }

  showAgenda(id){

    this.agendaHttp.show(id).subscribe(
      data=>{
        const response                       = (data as any);
        console.log(response);
        this.setAgenda(response);
    }, error=>{
      console.log(error);
     })

  }

  setAgenda(dados){

    this.agenda.id                       = dados.id;
    this.agenda.nome                     = dados.nome;
    this.agenda.nascimento               = dados.nascimento;
    this.agenda.email                    = dados.contato.email;
    this.agenda.telefone_celular         = dados.contato.telefone_celular;
    this.agenda.telefone_residencial     = dados.contato.telefone_residencial;
    this.agenda.cep                      = dados.endereco.cep;
    this.agenda.rua                      = dados.endereco.rua;
    this.agenda.complemento              = dados.endereco.complemento;
    this.agenda.numero                   = dados.endereco.numero;
    this.agenda.bairro                   = dados.endereco.bairro;
    this.agenda.cidade                   = dados.endereco.cidade;
    this.agenda.estado                   = dados.endereco.estado;
    this.agenda.pais                     = dados.endereco.pais;

    this.button                          = "Atualizar";

  }

  store(){

if(this.agenda.id){

  this.agendaHttp.update(this.agenda.id,this.agenda).subscribe(
    data=>{
      const response                       = (data as any);
      console.log(response);
      this.setAgenda(response);
  }, error=>{
    console.log(error);
   })

}else{

    this.agendaHttp.cadastrar(this.agenda).subscribe(
      data=>{
        const response                       = (data as any);
        console.log(response);
        this.setAgenda(response);
    }, error=>{
      console.log(error);
     })

  }
  }

  



}
