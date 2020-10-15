<?php

use App\Manufactor;
use Illuminate\Database\Seeder;

class ManufactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Manufactor::class, 20)->create();
    }
}
