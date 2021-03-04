<?php

namespace Database\Factories;

use App\Models\Shipping_information;
use Illuminate\Database\Eloquent\Factories\Factory;

class Shipping_InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipping_information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_holder'   => $this->faker->name(),
            'phone'         => $this->faker->phoneNumber() ,
            'city'          => $this->faker->city(),
            'address'       => $this->faker->address() ,
            'client_id'     => $this->faker->numberBetween(1, 5),
            'is_default'    => false
        ];
    }
}
