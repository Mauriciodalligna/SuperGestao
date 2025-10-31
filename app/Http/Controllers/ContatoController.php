<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(){
        // Método GET - apenas exibe a página de contato
        return view('site.contato', ['titulo' => 'Contato']);
    }
    
    public function salvar(Request $request){
        // Validação dos dados (opcional mas recomendado)
        $request->validate([
            'nome' => 'required|string|max:50',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:80',
            'motivo_contato' => 'required|integer|between:1,3',
            'mensagem' => 'required|string'
        ]);

        // Salvar os dados no banco
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();

        // Redirecionar de volta para a página de contato com mensagem de sucesso
        return redirect()->route('site.contato')->with('success', 'Mensagem enviada com sucesso!');
    }
}
