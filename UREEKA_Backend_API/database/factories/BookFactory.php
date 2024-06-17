<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'isbn' => $this->faker->unique()->isbn13(),
            'penulis' => $this->faker->name(),
            'tahun_terbit' => $this->faker->year(),
        ];
    }
}
