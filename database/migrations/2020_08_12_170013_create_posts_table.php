<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('setting_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->biginteger('hit')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('location')->default(1);
            $table->integer('must')->nullable();
            $table->string('slug');
            $table->string('seo_title');
            $table->string('title');
            $table->text('content');
            $table->mediumText('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
