import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class ListaServiceService {
  private baseApiPath="http://localhost:8000/api";

  constructor(public http: HttpClient) {

   }

   getContatos(){
    return this.http.get(`${this.baseApiPath}/contatos`);
    }

    excluir(id){
      return this.http.get(`${this.baseApiPath}/contatos/destroy/${id}`)
    }

    cadastrar(dados){
      return this.http.post(`${this.baseApiPath}/contatos/cadastro`,dados);
    }

    show(id){
      return this.http.get(`${this.baseApiPath}/contatos/show/${id}`);

    }

    update(id,dados){
      return this.http.post(`${this.baseApiPath}/contatos/update/${id}`,dados);
    }




}
