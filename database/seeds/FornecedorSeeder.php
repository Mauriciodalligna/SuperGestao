<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor1@gmail.com';
        $fornecedor->save();

        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 2';
        $fornecedor->site = 'fornecedor2.com.br';
        $fornecedor->uf = 'RJ';
        $fornecedor->email = 'fornecedor2@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 3',
            'site' => 'fornecedor3.com.br',
            'uf' => 'MG',
            'email' => 'fornecedor3@gmail.com',
        ]);
    }
}
