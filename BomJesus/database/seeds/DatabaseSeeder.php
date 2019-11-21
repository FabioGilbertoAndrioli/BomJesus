<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(ChromebooksTableSeeder::class);
        $this->call(ReservesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(SuportsTableSeeder::class);
        $this->call(ExchangesTableSeeder::class);
    }
}
