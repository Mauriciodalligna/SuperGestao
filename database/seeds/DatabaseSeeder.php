<?php

use Illuminate\Database\Seeder;
use App\SiteContato;
use App\MotivoContato;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoseeder::class);
    }
}
