<?php

namespace Database\Factories;

use App\Models\PromotionalCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionalCodeFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = PromotionalCode::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'code' => $this->faker->regexify('[A-Za-z0-9]{15}'),
      'claimed' => false,
      'user_id' => 1
    ];
  }
}
