<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nguoi_ChoiGoiCredit>
 */
class NguoiChoiGoiCreditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nguoi_choi_id'=>\App\Models\NguoiChoi::factory(),
            'goi_credit_id'=>\App\Models\NguoiGoiCredit::factory(),
            'credit'=>$this->faker->numberBetween($min = 100, $max = 900),
            'so_tien' => $this->faker->numberBetween($min = 1000, $max = 9
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
