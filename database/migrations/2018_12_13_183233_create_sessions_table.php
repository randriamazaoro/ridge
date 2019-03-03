<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('user_name')->nullable();
            $table->text('user_email')->nullable();
            $table->text('payload');
            $table->string('transaction_type')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('paypal_address')->nullable();
            $table->string('program')->nullable();
            $table->string('theme_mini')->nullable();
            $table->string('theme_maxi_1')->nullable();
            $table->string('theme_maxi_2')->nullable();
            $table->string('theme_maxi_3')->nullable();
            $table->string('paypal_payment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
