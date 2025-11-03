<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil )
    {
        
        echo "metodo: $metodo_autenticacao.$perfil.";
        if($metodo_autenticacao == 'padrao'){
            echo "Verificando... .$perfil.<br>";
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'Verificar usuário e senha no AD';
        }
            

        if(true){
            return $next($request);
        }else{
            return response('Acesso negado! Faça login', 403);
        }
    }
}
