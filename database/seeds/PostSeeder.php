<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50) -> make() -> each(function($post) {

            $user = User::inRandomOrder() -> limit(1) -> first();
            $post -> user() -> associate($user);

            $post -> save();
        });
    }
}
