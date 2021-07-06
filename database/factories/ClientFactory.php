<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

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
            'name' => $this->faker->firstName . " " . $this->faker->lastName,
            'address' =>  $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'city' => $this->cities[$curCity][0],
            'district' => $this->cities[$curCity][1][$curDistrict], 
            'cep' => $this->faker->numerify('########'),
            'phone1' => $this->faker->numerify('##########'),
            'phone2' => $this->faker->numerify('###########'),
        ];
    }
}
