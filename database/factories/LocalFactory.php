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


    // cities[N] = city.name | cities[N][1] -> districts from city | cities [N][1][N] = city.district
    protected $cities = [
        ['Guarapuava - PR', ['Centro', 'Dos Estados', 'Santa Cruz', 'Alto da XI'] ],
        ['Ponta Grossa - PR', ['Centro','Novo Horizonte'] ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $curCity = rand(0, count($this->cities) - 1);
        $curDistrict =  rand(0, count($this->cities[$curCity][1]) -1 );

        return [
            'status' => $this->faker->boolean,
            'title' => $this->faker->unique()->company,
            'address' =>  $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'city' => $this->cities[$curCity][0],
            'district' => $this->cities[$curCity][1][$curDistrict],
            
            // 'district' => $this->faker->citySuffix,
            // 'city' => $this->faker->city . ' - ' . $this->faker->stateAbbr,
            
            'cep' => $this->faker->numerify('########'),
            'phone1' => $this->faker->numerify('##########'),
            'phone2' => $this->faker->numerify('###########'),
        ];
    }
}
