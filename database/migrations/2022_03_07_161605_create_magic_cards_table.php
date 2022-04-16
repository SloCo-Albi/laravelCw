<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagicCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magic_cards', function (Blueprint $table) {
            $table->id();
            $table->string("card_name");
            $table->integer("mana_cost");
            $table->string("type");
            $table->string("sub_type")->nullable();
            $table->string("card_text");
            $table->string("rarity");
            $table->integer("power");
            $table->integer("toughness");
            $table->integer("loyalty")->nullable();
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
        Schema::dropIfExists('magic_cards');
    }
}
