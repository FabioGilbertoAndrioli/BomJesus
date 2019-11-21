<?php

use Illuminate\Database\Seeder;
use App\Models\Device;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
           'name' => 'Impressora',
           'brand' => 'Samsung',
           'model' => 'DX45',
           'serialNumber' => 'SK888ATAN',
           'patrimony' => '040',
           'room_id' => '1'
        ]);
    }
}
