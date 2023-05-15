import { Token } from '@angular/compiler';
import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/Services/api.service';
import { LocalstorageService } from 'src/app/Services/localstorage.service';
import { TokenService } from 'src/app/Services/token.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  form: any
  credenziali: boolean = false;
  erroreGenerico: boolean = false;

  constructor(
    private fb: FormBuilder, // formbuilder per costruire la form con i campi 
    private api:ApiService, // per chiamare il backend 
    private router:Router, // per navigare nelle pagine
    private token:TokenService,
    private localStorage:LocalstorageService,
    ) {
    //costruiamo la form
    this.form = fb.group({
      mail: ['', Validators.required],
      password: ['', Validators.required],
    })
  }

  submit() {
    const dati = this.form.value // {username: ..., password: ...}
    // funzione asincrona, la risposta non arriva instantaneamente, bisgona aspettare la risposta
    this.api.Login(dati.mail,dati.password).subscribe({     
      next: (res) => {
        this.token.setToken(res.Token)
        this.localStorage.save(res,"user")
        this.router.navigate(['/home'])
      },
      error: (err) => {
        if(err.error.description =='Unauthorized'){
          this.credenziali = true
          this.erroreGenerico = false
        }
        else{
          this.erroreGenerico = true
          this.credenziali = false
        }
      }
    })  
  }

}