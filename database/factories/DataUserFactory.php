<?php

namespace Database\Factories;

use App\Models\Data_user;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Data_user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id_data_user' => $this->faker->numerify('item-###'),
            // 'nama_kategori' => $this->faker->word(),
            // 'harga_jual_warga' => $this->faker->randomNumber(4, true),
            // 'harga_jual_rt' => $this->faker->randomNumber(4, true)
        ];
    }
}
