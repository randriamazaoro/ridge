<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnedThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_themes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->foreign()->reference('id')->on('affiliates');
            $table->integer('theme_id')->foreign()->reference('id')->on('themes');
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
        Schema::dropIfExists('owned_themes');
    }
}
