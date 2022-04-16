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
            $table->string("post_title");
            $table->longText("post_text");
            $table->unsignedBigInteger("magic_card_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("magic_card_id")->references("id")->on("magic_cards")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
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
