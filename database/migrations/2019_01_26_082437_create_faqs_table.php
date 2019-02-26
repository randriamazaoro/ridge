<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('answer');
            $table->string('question');
            $table->string('category');
            $table->string('tag');
            $table->timestamps();
        });

        DB::table('faqs')->insert([
            // Account
            [
                'question' => 'Comment créer mon compte sur Ridge ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment recevoir son E-book gratuit ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment devenir un membre premium sur Ridge ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Faut-il avoir un compte Paypal sur Ridge ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment télécharger sa formation selon le/les thème(s) choix ?  ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Peut-on posséder plusieurs comptes ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Peut-on s’inscrire de n’importe quel pays ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment contacter le support ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],

            // Payment

            [
                'question' => 'Quand se fait le paiement sur Ridge ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Quels sont les modes de paiement disponible ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'A combien peut-on retirer nos gains ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'En quelle devise se fait le paiement ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Comment se fait les calculs des commissions des membres premiums ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Combien peut-on gagner ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Quels le maximum de gain possible ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'En combien de temps puis-je voir le solde de mon compte ? ',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],

            // Product

            [
                'question' => 'Peut-on accéder au programme de rémunération de Ridge sans avoir pris un pack ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Produit',
                'tag' => 'is-danger',
            ],[
                'question' => 'Quel est l’avantage de prendre le pack ultra et pourquoi ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'Produit',
                'tag' => 'is-danger',
            ],

            // Program

            [
                'question' => 'Comment puis-je accéder au programme de rémunération ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
            ],[
                'question' => 'En quoi consiste le programme de rémunération ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
            ],[
                'question' => 'A combien de niveau peut-on gagner sur Ridge ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
            ],[
                'question' => 'Comment se présente la rémunération par la collecte d’adresse e-mail ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat.',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
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
        Schema::dropIfExists('faqs');
    }
}
