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
            'title'=> $this->faker->realText(200,2),
            'author'=> $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'slug'=> $this->faker->slug(),
            'content'=>$this->faker->sentence(20)
        ];
    }
}
