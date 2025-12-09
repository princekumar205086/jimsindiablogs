<?php

namespace Database\Factories;

use App\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        $word = ucfirst($this->faker->word);
        $page_slug = $this->faker->word . '_' . $this->faker->word;
        $meta_keywords = $this->faker->word . ', ' . $this->faker->word . ', ' . $this->faker->word;

        return [
            'user_id' => 1,
            'page_name' => $word,
            'page_slug' => $page_slug,
            'page_content' => $this->faker->paragraphs(3, true),
            'publication_status' => $this->faker->numberBetween(0, 1),
            'meta_title' => $word,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $this->faker->text(150),
        ];
    }
}
