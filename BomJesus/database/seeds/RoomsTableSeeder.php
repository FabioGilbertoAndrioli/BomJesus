<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'Acessoria',
            'type' => 'Administrativo'
        ]);

        Room::create([
            'name' => 'Sala 21',
            'level' => 'Médio',
            'type' => 'Pedagogia',
        ]);
    }
}
