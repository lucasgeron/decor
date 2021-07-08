<?php

namespace Database\Factories;

use App\Models\Index;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique->word,
            'status' => $this->faker->boolean,
            'ref' => $this->faker->lexify("??") . $this->faker->numerify('####'),
            'category_id' => rand(1,5),
            'index_id' => rand(1, Index::all()->count()),
        ];
    }
}
