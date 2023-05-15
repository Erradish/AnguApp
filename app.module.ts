import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './Components/header/header.component';
import { ApplicazioneComponent } from './Components/applicazione/applicazione.component';
import { ChatComponent } from './Components/chat/chat.component';
import { ConversazioneComponent } from './Components/conversazione/conversazione.component';
import { ProfiloComponent } from './Components/profilo/profilo.component';
import { UtentiComponent } from './Components/utenti/utenti.component';
import { EmailConfirmComponent } from './Pages/email-confirm/email-confirm.component';
import { HomeComponent } from './Pages/home/home.component';
import { LoginComponent } from './Pages/login/login.component';
import { RegisterComponent } from './Pages/register/register.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {MatFormFieldModule} from '@angular/material/form-field';
import { HttpClientModule } from '@angular/common/http';
import {MatMenuModule} from '@angular/material/menu';
import { MatInputModule } from '@angular/material/input';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    ApplicazioneComponent,
    ChatComponent,
    ConversazioneComponent,
    ProfiloComponent,
    UtentiComponent,
    EmailConfirmComponent,
    HomeComponent,
    LoginComponent,
    RegisterComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    MatFormFieldModule,
    BrowserAnimationsModule,
    ReactiveFormsModule,
    HttpClientModule,
    MatMenuModule,
    MatInputModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
