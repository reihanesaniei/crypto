<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeblogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'title'=> $this->faker->realText(200,2),
            'author'=> $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'slug'=> $this->faker->slug(),
            'img'=> 'avatar.jpg',
            'content'=>$this->faker->realText(1000,2)

        ];
    }
}
