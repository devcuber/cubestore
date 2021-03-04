<?php

namespace Database\Factories;

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
            'code'      => $this->faker->randomLetter(3) . $this->faker->randomNumber(3,true) ,
            'option'    => $this->faker->randomElement(['black' , 'stickerless' , 'white']),
            'name'      => $this->faker->randomElement(['Cyclone boys' , 'gan' , 'QiYi'])
                            .' ' .$this->faker->randomElement(['3x3' , '2x2' , '4x4']),
            'seller'    => 'Inframundohn',
            'price'     => $this->faker->randomNumber(3,false),
            'cost'      => $this->faker->randomNumber(3,false),
            'image'     => null,
            'category'  => $this->faker->randomElement(['3x3' , '2x2' , '4x4']),
            'available' => $this->faker->randomNumber(2,false)
        ];

    }
}
