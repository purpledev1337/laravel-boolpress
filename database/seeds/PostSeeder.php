<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Cat;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20) -> make() -> each(function($post, $cat) {

            $user = User::inRandomOrder() -> limit(1) -> first();
            $cat = Cat::inRandomOrder() -> limit(1) -> first();
            $post -> user() -> associate($user);
            $post -> cat() -> associate($cat);
            
            $post -> save();
        });
    }
}
