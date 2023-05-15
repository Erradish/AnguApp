import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class LocalstorageService {

  constructor() { }

  read(indice:string){
    var dati = localStorage.getItem(indice)
    if(dati == null ) return {}

    return JSON.parse(dati)
  }

  save(dati:any,indice:string){
    var stringa = JSON.stringify(dati)
    localStorage.setItem(indice,stringa)
  }

}
