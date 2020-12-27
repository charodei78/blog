<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence($nbWords = 4),
            'content' => $this->faker->realText(512),
            'image' => $this->faker->image('public/storage/post_images'),
            'tag' => $this->faker->word
        ];
    }
}
