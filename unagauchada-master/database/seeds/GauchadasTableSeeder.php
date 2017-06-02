<?php

use Illuminate\Database\Seeder;
use App\Gauchada;

class GauchadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gauchada::class, 42)->create();
    }
}
