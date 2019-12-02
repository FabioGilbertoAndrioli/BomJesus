<?php

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{

    public function __construct(Car $car)
    {

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'name' => 'Carrinho 01'
        ]);

        Car::create([
            'name' => 'Carrinho 02'
        ]);
    }
}
