<?php

namespace Database\Factories;

use App\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $word = ucfirst($this->faker->word);
        $category_slug = $this->faker->word . '_' . $this->faker->word;
        $meta_keywords = $this->faker->word . ', ' . $this->faker->word . ', ' . $this->faker->word;

        return [
            'user_id' => 1,
            'category_name' => $word,
            'category_slug' => $category_slug,
            'publication_status' => $this->faker->numberBetween(0, 1),
            'meta_title' => $word,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $this->faker->text(150),
        ];
    }
}
