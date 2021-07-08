<?php

namespace Database\Factories;

use App\Models\Index;
use App\Models\Local;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Index::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        //    'title' => $this->faker->lexify("??") . '1' . $this->faker->randomNumber(2, true), 
           'title' => $this->faker->regexify('[A-C]{2}[1-4]{3}'),
           'local_id' => rand(1, Local::all()->count()),
        ];
    }
}
