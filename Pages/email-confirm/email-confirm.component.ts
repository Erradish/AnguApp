import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiService } from 'src/app/Services/api.service';

@Component({
  selector: 'app-email-confirm',
  templateUrl: './email-confirm.component.html',
  styleUrls: ['./email-confirm.component.css']
})
export class EmailConfirmComponent {

  form: any

  constructor(
    private fb: FormBuilder, // formbuilder per costruire la form con i campi 
    private api:ApiService, // per chiamare il backend 
    private router:Router, // per navigare nelle pagine
    ) {
    //costruiamo la form
    this.form = fb.group({
      mail: ['', Validators.required],
      verification_code: ['', Validators.required],
    })
  }

  submit() {
    const dati = this.form.value // {username: ..., password: ...}
    // funzione asincrona, la risposta non arriva instantaneamente, bisgona aspettare la risposta
    this.api.Validate(dati.mail,dati.verification_code).subscribe((res)=>{     
      console.log(res)
    })  

  }
}
