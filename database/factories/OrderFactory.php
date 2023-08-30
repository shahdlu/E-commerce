<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user=User::inRandomOrder()->first();
        if(!$user)
        {
            $user=User::factory()->create();
        }
        return [
            //
            'user_id'=>$user->id,
            'price'=>fake()->numberBetween(1,1000),
        ];
    }
}
