<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->text(10),
            'description'=>fake()->paragraph(10),
            'published'=>true,
            'imageLink'=>"bookPicture/1ee49cdd76eb92e6edb7ad2f292caa78.jpg"
        ];
    }
}
