<?php

namespace Database\Seeders;

use App\Models\Index;
use Illuminate\Database\Seeder;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Index::factory(55)->create();
    }
}
