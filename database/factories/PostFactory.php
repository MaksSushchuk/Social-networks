<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $randomUserId = DB::table('users')->inRandomOrder()->first()->id;
        return [
            'title' => Str::random(30),
            'text' => Str::random(150),
            'file' => 'sgsgdsaasdvbsdf',
            'likes' => 2,
            'dislikes' => 3,
            'comment_amount' => 5,
            'admission' => 'publish',
            'user_id' => $randomUserId,
        ];
    }
}
