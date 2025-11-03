<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class LoginController extends Controller
{
    public function index(){
        return view('site.login',['titulo' => 'Login']);
    }
    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.required' => 'O campo usuário (e-mail) é obrigatório',
            'usuario.email' => 'O campo usuário deve ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório',
        ];
        
        $request->validate($regras, $feedback);

        $email= $request->get('usuario');

        $password= $request->get('senha');
        echo "Usuário: $email or Senha: $password";
        echo '<br>';

        $user = new User();

        $existe = $user->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

    if(isset($existe->name)){
        echo 'Usuário existe';
    }else{
        echo 'Usuário não existe';
    }
}
}
