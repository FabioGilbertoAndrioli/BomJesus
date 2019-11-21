<?php

use Illuminate\Database\Seeder;
use App\Models\Chromebook;

class ChromebooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chromebook::create([
            'serieNumber' => '07ZL9QAJC00656B',
            'patrimony' => '047532',
            'car_id' => 1
        ]);
    }
}
