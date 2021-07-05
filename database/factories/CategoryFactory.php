<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->boolean,
            'title' => $this->faker->jobTitle,
            // 'title' => $this->faker->lexify('?????'),
            // 'title' => substr($this->faker->word(), 0, rand(6, 20)) // create a fake Word, and set length range to something between 5 and 20, starting from char zero.
        ];
    }
}
