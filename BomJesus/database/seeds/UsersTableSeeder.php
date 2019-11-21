<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fábio Gilberto Andrioli Gonçalves',
            'email' => 'fabio.tads15@gmail.com',
            'password' => Hash::make('123456'),
            'sexo' => 'Masculino',
            'profile' => 'Administrador',

        ]);
    }
}
