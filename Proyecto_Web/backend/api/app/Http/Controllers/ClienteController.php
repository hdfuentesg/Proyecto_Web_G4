<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function signup(Request $request){
        Cliente::create($request->all());
    }

    public function login(Request $request){
        /*$correo = $request->input('correo');
        $clave = $request->input('clave');

        $cliente = Cliente::select('clave')->where('correo', $correo)->first();

        $res=array(
            "validado"=> $cliente->clave==$clave
        );

        return $res;*/

        $credentials = $request->all();

        $cliente = Cliente::where('correo', $credentials['correo'])->first();

        if(Hash::check($credentials['clave'],cliente)){
            $token = JWTAuth::fromUser($cliente);
        }else{
            return response ()->json(['error' => 'credenciales invalidas..'], 400);
        }

        return array ('token' => $token);
    }

    public function update(Request $request){

    }
    
    //
    public function showAll(){
        return Cliente::all();
    }

}
