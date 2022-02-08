<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table -> foreign('user_id', 'posts_user')
                   -> references('id')
                   -> on('users');
            $table -> foreign('cat_id', 'posts_cat')
                   -> references('id')
                   -> on('cats');
        });

        Schema::table('post_reaction', function (Blueprint $table) {
            $table -> foreign('post_id', 'post_reaction')
                   -> references('id')
                   -> on('posts');
            $table -> foreign('reaction_id', 'reaction_post')
                   -> references('id')
                   -> on('reactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropForeign('posts_user', 'posts_cat');
        });

        Schema::table('post_reaction', function (Blueprint $table) {
            $table -> dropForeign('post_reaction');
            $table -> dropForeign('reaction_post');
        });
    }
}
