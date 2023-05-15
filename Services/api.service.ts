import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private http: HttpClient) { }

  //private API_URL: string = "http://13.36.9.146"
  private API_URL: string = "http://localhost/PHP"
  Registrazione(username: string, mail:string, password: string,numero:string){
    return this.http.post<any>(this.API_URL + '/Register.php',{
        name: username,
        email: mail,
        password: password,
        number:numero,
    })
  }
  Login(mail:string, password:string){
    return this.http.post<any>(this.API_URL + '/Login.php',{
      email: mail,
      password:password,
    })
  }
  Validate(mail:string, verification_code:string){
    return this.http.post<any>(this.API_URL + '/Verification.php',{
      email: mail,
      verification_code:verification_code,
    })
  }
}
