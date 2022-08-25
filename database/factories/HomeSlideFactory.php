<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeSlide>
 */
class HomeSlideFactory extends Factory
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
        $faker->addProvider(new \Faker\Provider\Youtube($faker));

        return [
            'title' => fake()->paragraph(2),
            'short_title' => fake()->sentence(4),
            'home_slide' => $faker->imageUrl(640, 480, ['spedition', 'truck']),
            'video_url' => $faker->youtubeRandomUri,
        ];
    }
}
