<?php

use Illuminate\Database\Seeder;
use App\Models\Reserve;
use Carbon\Carbon;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserve::create([
            'user_id' => '1',
            'classes' => ["primeira","segunda","terceira","quarta","quinta"],
            'car_id' => '1',
            'level'=> 'Fundamental',
            'class' => '6 ano',
            'period' => 'Manha',
            'date' => '2019-11-18'
        ]);
    }
}
