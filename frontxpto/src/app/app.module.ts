import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { ListaComponent } from './lista/lista.component';


import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './/app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { ListaServiceService } from './lista-service.service';
import { AgendaFormComponent } from './agenda-form/agenda-form.component';
import { MenuComponent } from './menu/menu.component';
import { LoginComponent } from './login/login.component';


@NgModule({
  declarations: [
    AppComponent,
    ListaComponent,
    AgendaFormComponent,
    MenuComponent,
    LoginComponent,


  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    HttpClientModule,
    
  ],
  providers: [ ListaServiceService],
  bootstrap: [
    AppComponent

  ]
})
export class AppModule { }
