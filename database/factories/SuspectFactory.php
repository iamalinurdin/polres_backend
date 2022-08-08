<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suspect>
 */
class SuspectFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $countUser = User::all()->count();

    return [
      'report_number' => fake()->randomNumber(4, true),
      'name' => fake()->name(),
      'id_number' => fake()->randomNumber(8, true),
      'description' => fake()->text(500),
      'address' => fake()->address(),
      'guardian' => fake()->name('male'),
      'user_id' => fake()->numberBetween(1, $countUser),
    ];
  }
}
