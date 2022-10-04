<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(rand(0, 10)),
            'content' => $this->faker->words(rand(50,500), true),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(),
            'user_id' => User::factory()->createOne()->id,
        ];
    }
}
