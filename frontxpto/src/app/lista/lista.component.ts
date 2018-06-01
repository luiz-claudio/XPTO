import { Component, OnInit } from '@angular/core';
import { ListaServiceService } from '../lista-service.service';

@Component({
  selector: 'app-lista',
  templateUrl: './lista.component.html',
  styleUrls: ['./lista.component.css']
})
export class ListaComponent implements OnInit {

  public agenda = new Array<any>()
  public dataSource;

  constructor(private agendaHttp: ListaServiceService) {

  }

  ngOnInit() {
    this.getagenda();
  }

  getagenda(){
    this.agendaHttp.getContatos().subscribe(
      data=>{
        const response                       = (data as any);
        this.agenda =response;
        this.dataSource = response;

    }, error=>{
      console.log(error)
     })
  }
  excluir(id){
  this.agendaHttp.excluir(id).subscribe(
    data=>{
      const response     = (data as any);
      this.getagenda();
    }, error=>{

    })
    }//

  applyFilter(filterValue: string) {


    const val = filterValue;

    // if the value is an empty string don't filter the items
    if (val && val.trim() != '') {
      this.dataSource = this.dataSource.filter((value) => {
        return (value.toLowerCase().indexOf(val.toLowerCase()) > -1);
      })
    }
  }





  }


