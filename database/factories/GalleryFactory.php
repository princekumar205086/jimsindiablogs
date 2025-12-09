<?php

namespace Database\Factories;

use App\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'caption' => $this->faker->sentence,
            'image' => '1.jpg',
            'publication_status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
