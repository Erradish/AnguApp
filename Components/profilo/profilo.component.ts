import { Component } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LocalstorageService } from 'src/app/Services/localstorage.service';

@Component({
  selector: 'app-profilo',
  templateUrl: './profilo.component.html',
  styleUrls: ['./profilo.component.css']
})
export class ProfiloComponent {

  constructor(private localStorageService:LocalstorageService, private router:Router){
  }

  logout(){
    this.localStorageService.save('','user')
    this.localStorageService.save('','token')
    localStorage.removeItem('user')
    localStorage.removeItem('token')
    this.router.navigate(['/login'])
  }

  get user(){
    return this.localStorageService.read('user')
  }
}
