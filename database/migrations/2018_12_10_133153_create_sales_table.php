<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->foreign()->reference('id')->on('affiliates');
            $table->string('product');
            $table->decimal('referral_value',5,2)->nullable();
            $table->decimal('real_value',5,2);
            $table->decimal('benefits',5,2);
            $table->integer('gains_per_email_limit');
            $table->boolean('requested');
            $table->string('status');
            $table->string('tag');
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
        Schema::dropIfExists('sales');
    }
}
