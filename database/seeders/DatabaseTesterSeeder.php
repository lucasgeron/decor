<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseTesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            LocalSeeder::class,
        ]);
    }
}
