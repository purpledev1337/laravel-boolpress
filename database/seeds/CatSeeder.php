<?php

use Illuminate\Database\Seeder;
use App\Cat;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cat::class, 6) -> create();
    }
}
