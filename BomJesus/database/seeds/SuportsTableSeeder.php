<?php

use Illuminate\Database\Seeder;
use App\Models\Suport;

class SuportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suport::create([
            'problema' => 'Fazendo barulho ao imprimir',
            'tecnico' => 'Leonardo',
        ]);
    }
}
