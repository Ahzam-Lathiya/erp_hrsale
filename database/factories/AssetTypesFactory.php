<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\AssetTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AssetTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sdesc' => fake()->name(),
            'ldesc' => fake()->name(),
            'status' => fake()->boolean(),
            'created_at' => Carbon::create('2022', '12', '01'),
            'updated_at' => Carbon::create('2022', '12', '01'),
        ];
    }

    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => '0',
            ];
        });
    }

    protected $model = AssetTypes::class;
}
