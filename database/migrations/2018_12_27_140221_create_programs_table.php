<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('formation');
            $table->string('remuneration');
            $table->string('social');
            $table->string('advantages');
            $table->decimal('gains_per_email',5,2);
            $table->decimal('gains_per_sale',5,2);
            $table->integer('gains_per_email_limit');

        });

        DB::table('programs')->insert([
        [
            'name' => 'Mini',
            'price' => 10,
            'formation' => 'Un seul choix sur la liste des thèmes',
            'remuneration' => 'Accès au programme de rémunération par CPA & Affiliation (Avantages pack mini)',
            'social' => '1000 groupes Facebook sur le business',
            'advantages' =>  'N/A',
            'gains_per_email' => 0.5,
            'gains_per_sale' => 0.15,
            'gains_per_email_limit' => 0,
        ],[
            'name' => 'Maxi',
            'price' => 25,
            'formation' => '3 choix sur la liste des thèmes',
            'remuneration' => 'Accès au programme de rémunération par CPA & Affiliation (Avantages pack maxi)',
            'social' => '1000 groupes Facebook sur le business en ligne',
            'advantages' =>  'N/A',
            'gains_per_email' => 0.5,
            'gains_per_sale' => 0.25,
            'gains_per_email_limit' => 5,
        ],[
            'name' => 'Ultra',
            'price' => 75,
            'formation' => 'Tous les thèmes + les mises à jour',
            'remuneration' => 'Accès au programme de rémunération par CPA & Affiliation (Avantages pack ultra)',
            'social' => '1000 groupes Facebook',
            'advantages' => 'Une liste des Business en ligne',
            'gains_per_email' => 1,
            'gains_per_sale' => 0.30,
            'gains_per_email_limit' => 10,
        ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
