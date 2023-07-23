<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,100),
            'nickname'=>$this->faker->name,
            'self_introduction'=>$this->faker->realText,
            'sex'=>$this->faker->randomElement([0,1,null]),
            'age'=>$this->faker->numberBetween(18,100),
            'prefecture'=>$this->faker->address(),
        ];
    }
}
