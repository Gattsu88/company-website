<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\about>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        return [
            'title' => fake()->paragraph(2),
            'short_title' => fake()->sentence(5),
            'short_description' => fake()->sentence(5),
            'long_description' => fake()->sentence(150),
            'about_image' => $faker->imageUrl(636, 852, ['spedition', 'truck'], false),
        ];
    }
}
