import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Options } from 'selenium-webdriver/edge';

@Injectable()
export class ListaServiceService {
  private baseApiPath="http://localhost:8000/api";
  private header: Headers;

  constructor(public http: HttpClient) {

    let token = window.localStorage.getItem('token');
    this.setToken(token);

   }
   setToken (token){

     this.header = new Headers({'Autorization': 'Bearer ' + token});
   }

   getContatos(){
    return this.http.get<any>(`${this.baseApiPath}/contatos`);
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

    getToken(dados)
    {
      return this.http.post(`${this.baseApiPath}/login`,dados);
    }




}
