<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\OrderStatus;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    
    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => OrderStatus::getOrderStatus()[rand(0, count(OrderStatus::getOrderStatus()) - 1)],
            'client_id' => rand(1,Client::all()->count()),
        ];
    }
}
