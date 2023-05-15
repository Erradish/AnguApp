import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { TokenService } from './token.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService implements CanActivate{

  constructor(private tokenService:TokenService, private router:Router){

  }

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      const token = this.tokenService.getToken()
      if(token == null || token == undefined){
        this.router.navigate(['/login', {error:'Devi esser loggato per accedere a questa funzione'}])
      }
      return token != null
  }
}
