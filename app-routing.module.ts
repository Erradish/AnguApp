import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './Pages/login/login.component';
import { RegisterComponent } from './Pages/register/register.component';
import { EmailConfirmComponent } from './Pages/email-confirm/email-confirm.component';
import { AuthService } from './Services/auth.service';
import { HomeComponent } from './Pages/home/home.component';

const routes: Routes = [
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'register',
    component: RegisterComponent
  },
  {
    path: 'emailConfirm',
    component: EmailConfirmComponent
  },
  {
    path: 'home',
    canActivate:[AuthService],
    component: HomeComponent
  },
  {
    path:'',
    component:LoginComponent
  },
  {
    path:'**',
    component:LoginComponent
  },

  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
