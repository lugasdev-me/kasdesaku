<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jumlah' => random_int(1000, 5000000),
            'keterangan' => $this->faker->name(),
            'created_at' => $this->faker->dateTimeBetween('-2 years', '+2 years')
        ];
    }
}
