<?php

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Car;

class LocationsTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car =  Car::create([
                'name' => 'Carrinho 01'
            ]);
        Location::create($car);
    }
}
