<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){
        // Método GET - apenas exibe a página de contato
        $motivo_contato = MotivoContato::all();
    
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }
    
    public function salvar(Request $request){
        // Validação dos dados
        $regras = [
            'nome' => 'required|string|min:3|max:40|unique:site_contatos',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:80',
            'motivo_contato_id' => 'required|integer|exists:motivo_contatos,id',
            'mensagem' => 'required|string|max:2000'
        ];

        $feedback = [
            'nome.unique' => 'O campo nome já está em uso',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.required' => 'O campo nome precisa ser preenchido',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'telefone.max' => 'O campo telefone precisa ter no máximo 20 caracteres',
            'email.required' => 'O campo email precisa ser preenchido',
            'email.email' => 'O campo email precisa ser um email válido',
            'email.max' => 'O campo email precisa ter no máximo 80 caracteres',
            'motivo_contato_id.required' => 'O campo motivo do contato precisa ser preenchido',
            'motivo_contato_id.integer' => 'O campo motivo do contato precisa ser um número inteiro',
            'motivo_contato_id.exists' => 'O campo motivo do contato precisa ser um motivo válido',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index')->with('success', 'Mensagem enviada com sucesso!');
    }
}