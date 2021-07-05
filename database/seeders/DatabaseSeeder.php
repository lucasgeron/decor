<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Local;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
        
        User::factory()->create([
            'name' => 'Lucas Fernando',
            'email' => 'lucasf.geron@icloud.com',
            'password' => '$2y$10$aSbHp.i9gnAQFgxOXzuiV.dpexVjd6A6xHHmBjLjE0bfOuR2PYNUq' // password
        ]);

        Local::factory()->create([
            'status' => '1',
            'title' => 'Shine Decor',
            'address' =>  'Rua Juvino Lara Galvão',
            'number' => '497',
            'district' => 'Dos Estados',    
            'city' => 'Guarapuava - PR',
            'cep' => '85035220',
            'phone1' => '',
            'phone2' => '4299882121',
        ]);

        
    }
}
