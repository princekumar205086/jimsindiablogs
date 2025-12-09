<?php

namespace Database\Factories;

use App\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4),
            'post_id' => $this->faker->numberBetween(1, 20),
            'comment' => $this->faker->paragraph,
            'publication_status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
