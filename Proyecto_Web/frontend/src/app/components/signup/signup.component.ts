import { Component, OnInit } from '@angular/core';
import { DataService } from '../../services/data.service';
import { NgForm, FormGroup, FormControl } from '@angular/forms';
import { ActivatedRoute, ParamMap } from '@angular/router';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  form = new FormGroup({
    doc: new FormControl(''),
    nombre: new FormControl(''),
    apellidos: new FormControl(''),
    correo: new FormControl(''),
    clave: new FormControl('')
  });

  constructor(
    private data:DataService,
    private route:ActivatedRoute
  ){
    
  }

  ngOnInit(): void {
    this.route.paramMap.subscribe(function(data){
      let id = data.get('id');

      console.log(id);
    })
  }

  signup(){
    this.data.signup(this.form.value).subscribe(function(data){
      
    });
  }
}
