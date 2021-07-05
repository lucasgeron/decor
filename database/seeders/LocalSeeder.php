<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Local;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Local::factory(10)->create();
    }
}
