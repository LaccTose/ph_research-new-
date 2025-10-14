<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HealthCenter;

//HealthCenter::factory()->create();

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthCenter>
 */
class HealthCenterFactory extends Factory
{
    protected $model = HealthCenter::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'district' => $this->faker->city,
            'subdistrict' => $this->faker->streetName,
            'phone' => $this->faker->phoneNumber,
            'facebook' => $this->faker->url,
            'line' => '@' . $this->faker->word,
            'address' => $this->faker->address,
        ];
    }
}
HealthCenter::factory()->count(5)->create();
