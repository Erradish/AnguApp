import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/Services/api.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {

  form: any

  constructor(
    private fb: FormBuilder, // formbuilder per costruire la form con i campi 
    private api:ApiService, // per chiamare il backend 
    private router:Router, // per navigare nelle pagine
    ) {
    //costruiamo la form
    this.form = fb.group({
      mail: ['', Validators.required],
      username: ['', Validators.required], //stesso nome che abbimao messo nel formcontrolname in HTML, required vuol dire che il campo è obbligatorio
      password: ['', Validators.required],
      cellulare: ['', Validators.required]
    })
  }

  submit() {
    const dati = this.form.value // {username: ..., password: ...}
    // funzione asincrona, la risposta non arriva instantaneamente, bisgona aspettare la risposta
    this.api.Registrazione(dati.username,dati.mail,dati.password,dati.cellulare).subscribe((res)=>{     
      console.log(res)
    })  

  }
}
