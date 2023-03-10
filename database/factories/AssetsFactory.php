<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Assets;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assets>
 */
class AssetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'asset_type_id' => fake()->unique()->randomDigitNotNull(),
            'asset_type_id' => 1,
            'name' => fake()->name(),
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

    // public function configure()
    // {
    //     echo "Init Factory" . "\n";
    // }

    protected $model = Assets::class;
}
