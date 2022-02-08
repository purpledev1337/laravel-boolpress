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
            // $table->dropForeign('posts_cat');
        });

    }
}
