<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->integer('id')->foreign()->reference('id')->on('users');
            $table->string('program');
            $table->decimal('gains_per_sale',5,2);
            $table->decimal('gains_per_email',5,2);
            $table->integer('gains_per_email_limit');
            $table->timestamps();
        });

        DB::table('affiliates')->insert([
            'id' => 1,
            'program' => 'Admin',
            'gains_per_sale' => 0,
            'gains_per_email' => 0,
            'gains_per_email_limit' => 999999,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliates');
    }
}
