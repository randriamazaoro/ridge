<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->longText('description');
            $table->timestamps();
        });

        DB::table('themes')->insert([
            [
                'title' => 'Cuisine',
                'url' => 'https://mega.nz/?fbclid=IwAR3fqcUG3lIOuN7AxaaOKQ-rbarkJJ8LnAOIKn5zniQ4Wf0yqUj0aTv2lUI#F!NQlwkSAQ!NAXT6kbuxVrRrhBwEjY4gQ',
                'description' => 
                '+ 225 livres PDF recettes de cuisine : entrées, plats, fruits de mer, desserts, pâtisserie, chocolat, pizza, glace...
                + 3 Logiciels de recettes de cuisine
                + 10 livres PDF décoration de table et maison',
            ],[
                'title' => 'Informatique',
                'url' => 'https://mega.nz/#F!cZdm2azR!zSyYKJ8G0pljM6jy5NusOQ',
                'description' => '+ 250 livres PDF sur la programmation, développement, web, linux, base de données, Réseau etc...',
            ],[
                'title' => 'Développement personnel',
                'url' => 'https://mega.nz/?fbclid=IwAR0E3p_SZnm1VfZC-GqUQ9CDKYmBUvRrDIbigdP5tPwCDJjFo9UCcq34Aus#F!9cE2TAgT!vlEYh95N8nGEtqzY3gGsOA',
                'description' => '+ 185 livres PDF sur : développement personnel (+mp3), musculation, psychologie...
                Changement sans stress, comment avoir une excellente mémoire, la maîtrise de soi, tout le monde mérite d\'etre riche etc...',
            ],[
                'title' => 'La gestion d\'entreprise',
                'url' => '',
                'description' => '+ 290 livres PDF sur : compatibilité, marketing, logistique, IAS IFRS, Business plan, stratégie, contrôle de gestion, création d\'entreprise etc...',
            ],[
                'title' => 'Le leadership et le management',
                'url' => '',
                'description' => '+ 20 formations video interactive sur le leadership, le management : accueillir le changement, savoir gérer son temps, réussir sa prise de parole en public, le management situationnel, prendre de bonnes décisions etc...',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
