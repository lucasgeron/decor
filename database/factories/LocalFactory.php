<?php

namespace Database\Factories;

use App\Models\Local;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Local::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->boolean,
            'title' => $this->faker->unique()->company,
            'address' =>  $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'district' => $this->faker->citySuffix,
            'city' => $this->faker->city . ' - ' . $this->faker->stateAbbr,
            'cep' => $this->faker->numerify('########'),
            'phone1' => $this->faker->numerify('##########'),
            'phone2' => $this->faker->numerify('###########'),
        ];
    }
}
