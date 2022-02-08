<?php

use Illuminate\Database\Seeder;
use App\Reaction;
use App\Post;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reaction::class, 10) -> create() -> each(function($reaction) {

            $posts = Post::inRandomOrder() -> limit(rand(0,5)) -> get();

            $reaction -> posts() -> attach($posts);

            $reaction -> save();
        });
    }
}
