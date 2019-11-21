<?php

use Illuminate\Database\Seeder;
use App\Models\Exchange;

class ExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exchange::create([
        'toner' => '307U',
        'device_id' => 1
        ]);
    }
}
