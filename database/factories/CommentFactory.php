<?php

namespace Database\Factories\irst_app\database\factories;

use App\Models\Posts;
use App\Models\Comment;
use Database\Factories\helper\RandomId;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body'=>[],
            'user_id'=>1,
            'post_id'=>1
        ];
    }
}
