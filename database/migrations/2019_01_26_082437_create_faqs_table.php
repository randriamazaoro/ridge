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
                'answer' => 'C\'est très simple, il suffit de cliquer sur le bouton "Crèer un compte" sur la barre de navigation. Vous aurez à remplir un formulaire où vous serez invité à nous fournir votre adresse e-mail, et un mot de passe pour pouvoir vous connecter à votre compte.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment recevoir son E-book gratuit ?',
                'answer' => 'Sur la page d\'acceuil de notre site web, nous vous fournissons un formulaire où vous pouvez insèrer votre adresse e-mail. Après cela, nous vous envoyons un lien pour que vous puissiez télécharger et profiter de votre e-book gratuit !',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment devenir un membre premium sur Ridge ? ',
                'answer' => 'Pour pouvoir accèder à notre programme de rémunération, il faut être un membre premium. Pour ce faire, juste après avoir créer votre compte, nous vous proposons de choisir et acheter l\'un de nos Pack. L\'investissement varie entre 10€ jusqu\'à 75€.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Faut-il avoir un compte Paypal sur Ridge ? ',
                'answer' => 'Il est indispensable d’avoir un compte Paypal pour pouvoir faire retirer vos gains sur notre plateforme. Toutefois, nous allons bientôt revendre des comptes pour les pays où cette solution de paiement est difficile d\'accès.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment télécharger sa formation selon le/les thème(s) choix ?  ',
                'answer' => 'Pour télécharger votre formation, il suffit d’aller sur votre espace membre, de là vous pouvez voir la liste du (des) thème(s) que vous avez choisi puis le télécharger.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Peut-on posséder plusieurs comptes ? ',
                'answer' => 'Nous permettons à nos utilisateur de n\'avoir qu\'un seul compte. De cette manière, nous nous assurons de l\'authenticité et l\'unicité de nos membres.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Peut-on s’inscrire de n’importe quel pays ? ',
                'answer' => 'Oui, Ridge est une plateforme de digital marketing ouvert au monde entier.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],[
                'question' => 'Comment contacter le support ? ',
                'answer' => 'Vous pouvez nous contacter à travers la rubrique "Contact" sur le haut de la page, dans cette dernière vous aurez à remplir un formulaire de contact en y comprenant votre adresse e-mail de contact, l\'objet de votre message et le message bien sur.',
                'category' => 'Compte',
                'tag' => 'is-primary',
            ],

            // Payment

            [
                'question' => 'A quel moment se fait le paiement sur Ridge ?',
                'answer' => 'Le paiement se fait à tout moment après que vous ayez atteint le seuil de paiement minimum de 100€. Cependant, exceptionnellement pour le lancement de Ridge les retraits pourrons se faire à partir de 50€.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Quels sont les modes de paiement disponible ?',
                'answer' => 'Pour les retraits, le seul moyen de paiement disponible pour le moment est PayPal. Bien sûr, nous envisageons de nous ouvrir sur d\'autres horizons dans le futur.' ,
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'A combien peut-on retirer nos gains ?',
                'answer' => 'Le seuil de paiement minimum de 100€. Cependant, exceptionnellement pour le lancement de Ridge les retraits pourrons se faire à partir de 50€.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'En quelle devise se fait le paiement ?',
                'answer' => 'Nous utilisons l\'Euro comme devise pour le moment (Une possibilité d\'extension vers le Dollar)',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Comment se fait les calculs des commissions des membres premiums ? ',
                'answer' => 'Les commissions des membres premiums dépendent du pack qu’ils ont pris. Pour contre les commissions, veuillez avoir la page d’accueil de Ridge.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Combien peut-on gagner ? ',
                'answer' => 'Pour les habitués d’affiliation et de marketing de réseau pour ne pas dire les professionnels, ils peuvent facilement se faire entre 1.000€ et 10.000€ par mois sur un site d’affiliation.<br/>
                Pour les nouveaux dans le monde de l\'affiliation, nous avons pensé à vous. Nous avons spécialement acheté un livre dédié à vous apprendre les bases. Vous pouvez le commander en insèrant votre adresse e-mail sur le formulaire tout en haut de la page d\'acceuil du site web',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'Quels le maximum de gain possible ? ',
                'answer' => 'Il n’y a pas de limite de gain. Vous gagnez en fonction de vos efforts.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],[
                'question' => 'En combien de temps puis-je voir le solde de mon compte ? ',
                'answer' => 'Après avoir atteint le seuil de paiement, vous pouvez demander un transfert direct sur votre compte PayPal. Nous repondrons à votre demande de retrait le plus vite possible.',
                'category' => 'Paiement',
                'tag' => 'is-warning',
            ],

            // Product

            [
                'question' => 'Peut-on accéder au programme de rémunération de Ridge sans avoir pris un pack ?',
                'answer' => 'Il est nécessaire d\'avoir un pack pour pouvoir profiter pleinement de notre plateforme. Nous vous proposons plusieurs gamme disponible avec des différentes avantages.',
                'category' => 'Produit',
                'tag' => 'is-danger',
            ],[
                'question' => 'Quel est l’avantage de prendre le pack ultra et pourquoi ?',
                'answer' => 'En prenant le Pack Ultra, vous aurez accès à toutes les thématiques, les mises à jours, la rémunération est la plus élevé (avec 1€ par e-mail validé) et divers bonus qui vous seront communiqués prochainement.',
                'category' => 'Produit',
                'tag' => 'is-danger',
            ],

            // Program

            [
                'question' => 'Comment puis-je accéder au programme de rémunération ?',
                'answer' => 'Pour bénéficier des avantages que nous proposons, il est nécessaire de souscrire à l\'un de nos Packs.',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
            ],[
                'question' => 'En quoi consiste le programme de rémunération ?',
                'answer' => 'Le programme de rémunération de Ridge se présente en deux forme, en premier lieu le CPA (coût par action) et l’affiliation.
                La CPA consiste à inviter des gens à s’inscrire sur notre plateforme. L’affiliation consiste à inviter des personnes, non seulement à s\'inscrire, mais également à acheter l\'un de nos Packs. Vous recevez bien sur des commissions de ventes selon le Pack que vous avez choisi
                ',
                'category' => 'CPA & Affiliation',
                'tag' => 'is-success',
            ],[
                'question' => 'Comment se présente la rémunération par la collecte d’adresse e-mail ?',
                'answer' => 'C\'est simple, lorsque qu’une personne s’inscrit à partir de votre lien de référence, vous recevez entre 0.50€ et 1€ (selon le Pack que vous avez choisi). Ce dernier va s\'ajouter à votre solde, retirable lorsque le seuil minimum de paiement est atteint.',
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
