<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Captura informações antes de processar a requisição
        $ip = $request->ip();
        $rota = $request->getRequestUri();
        
        // Processa a requisição e obtém a resposta
        $resposta = $next($request);
        
        // Salva o log após processar a requisição
        LogAcesso::create(['log' => "$ip requisitou a rota $rota"]);
        
        // Modifica o status code da resposta se necessário
        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados!!');
        
        return $resposta;
    }
}
