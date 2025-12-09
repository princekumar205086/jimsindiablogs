<?php

namespace Database\Factories;

use App\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $word = ucfirst($this->faker->word);
        $post_slug = $this->faker->word . '_' . $this->faker->word;
        $meta_keywords = $this->faker->word . ', ' . $this->faker->word . ', ' . $this->faker->word;

        return [
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 15),
            'post_date' => $this->faker->date('Y-m-d', 'now'),
            'post_title' => $this->faker->sentence,
            'post_slug' => $post_slug,
            'post_details' => $this->faker->paragraphs(5, true),
            'publication_status' => $this->faker->numberBetween(0, 1),
            'is_featured' => $this->faker->numberBetween(0, 1),
            'meta_title' => $word,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $this->faker->text(150),
        ];
    }
}
