<?php

namespace Database\Factories;

use App\Models\CategoryBlog;
use App\Models\PostBlog;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostBlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostBlog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('pt_BR');
        $categories_id = CategoryBlog::all()->pluck('id')->toArray();
        $key_category = array_rand($categories_id);
        $users_id = User::all()->where('type', '=', '1')->pluck('id')->toArray();
        $key_user = array_rand($users_id);
        return [
            'title' => $faker->word,
            'subtitle' => $faker->word,
            'headline' => $faker->text(50),
            'contents' => $faker->text(500),
            'image_path' => "post_default.png",
            'category_id' => $categories_id[$key_category],
            'user_id' => $users_id[$key_user],
        ];
    }
}
