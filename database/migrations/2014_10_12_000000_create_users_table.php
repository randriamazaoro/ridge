<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->foreign()->reference('id')->on('affiliate');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('paypal_address')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->ipAddress('ip_address');
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Superadmin',
            'affiliate_id' => 1,
            'email' => 'zekemahery@gmail.com',
            'paypal_address' => 'zekemahery@gmail.com',
            'password' => Hash::make('Azerty012'),
            'role' => 1,
            'status' => 'Actif',
            'ip_address' => request()->ip(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
