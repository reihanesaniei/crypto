<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContactFactory extends Factory
{
    public function definition(){
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'mobile' => $this->faker->phoneNumber(),
            'comments' => $this->faker->text()

        ];
    }
}
