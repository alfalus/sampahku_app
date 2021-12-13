<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Sampah;
use Illuminate\Database\Eloquent\Factories\Factory;

class SampahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sampah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_sampah' => $this->faker->randomNumber(2, true),
            'nama_kategori' => $this->faker->word(),
            'harga_jual_warga' => $this->faker->randomNumber(4, true),
            'harga_jual_rt' => $this->faker->randomNumber(4, true)
        ];
    }
}
