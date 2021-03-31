<?php

namespace Database\Factories;

use App\Models\CategoryBlog;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryBlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryBlog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->word,
        ];
    }
}
