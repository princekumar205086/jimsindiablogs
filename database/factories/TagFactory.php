<?php

namespace Database\Factories;

use App\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $word = ucfirst($this->faker->word);
        $tag_slug = $this->faker->word . '_' . $this->faker->word;
        $meta_keywords = $this->faker->word . ', ' . $this->faker->word . ', ' . $this->faker->word;

        return [
            'user_id' => 1,
            'tag_name' => $word,
            'tag_slug' => $tag_slug,
            'publication_status' => $this->faker->numberBetween(0, 1),
            'meta_title' => $word,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $this->faker->text(150),
        ];
    }
}
