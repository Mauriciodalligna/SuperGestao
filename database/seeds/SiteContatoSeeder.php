<?php

use Illuminate\Database\Seeder;
use App\SiteContato;  
class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 3333-4444';
        $contato->email = 'supergestao@dominio.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Teste de mensagem';
        $contato->save();

        $contato=new SiteContato();
        $contato->nome = 'Sistema Teste';
        $contato->telefone = '(11) 3333-5555';
        $contato->email = 'teste@dominio.com.br';
        $contato->motivo_contato = 2;
        $contato->mensagem = 'Teste de mensagem 2';
        $contato->save();*/

        factory(SiteContato::class, 100)->create();
    }
}
