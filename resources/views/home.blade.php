@extends('layouts.app')

@section('content')

@include('partials.navigation-positionned',['color' => 'is-dark'])
<!-- HEADER -->
<header class="hero has-background-abstract">
    <!-- TEXT -->
    <div class="hero-body is-block">
        <br/>
        <div class="columns is-vcentered is-centered">
            <div class="column is-5">
                <p class="title is-2">
                    <b>Apprendre et gagner de l'argent en même temps</b>
                </p>
                <p class="subtitle is-4">
                    Vous êtes vous déjà demandé si c'était possible ?
                </p>
            </div>

            <div class="column is-4 is-offset-1">
                <div class="box animated bounceIn">
                    <div class="is-perfectly-centered">
                        <figure class="image is-128x128">
                            <img src="{{ asset('svg/mini.svg') }}" />
                        </figure>
                    </div>
                    <br />
                    <p class="has-text-centered">
                        Comme un avant-gout, nous allons vous envoyer
                        <b class="has-text-success">un e-book gratuit</b> sur le
                        thême de notre activité. Pour ce faire nous aurons
                        besoin de :
                    </p>
                    <br />

                    <form method="POST" action="{{ url('newsletter/add') }}">
                        @csrf

                        <div class="field">
                            <div class="control">
                                <label for="email" class="label"
                                    >Votre adresse e-mail</label
                                >
                                <input
                                    id="email"
                                    type="email"
                                    class="input is-rounded {{ $errors->has('email') ? ' is-danger' : '' }}"
                                    name="email"
                                    value=""
                                    required
                                />

                                @if ($errors->has('email'))
                                <span class="has-text-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <br />

                        <div class="field">
                            <div class="control">
                                <button
                                    type="submit"
                                    class="button is-rounded is-primary is-fullwidth"
                                >
                                    Recevoir l'ebook
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- END OF TEXT -->
</header>

<!-- HOW IT WORKS -->
<section class="section is-medium">
    <p class="has-text-centered">
        <span class="title is-2 has-text-primary">Qu'est-ce que Ridge ?</span
        ><br />
        <span class="subtitle">Et que faisons-nous ?</span>
    </p>
    <br />
    <br />
    <div class="columns is-vcentered is-centered is-size-5-desktop">
        <!-- CONTENT LIST -->
        <div class="column is-3">
            <div class="columns is-multiline has-text-right">
                <div class="column is-12 content">
                    <p>
                        <b>Un style de vie</b><br />
                        Travailler librement à travers le digital, sans la
                        contrainte d'une hiérarchie.
                    </p>
                </div>

                <div class="column is-12 content">
                    <p>
                        <b>Une formation</b><br />
                        Plusieurs documents (e-books, video, logiciels
                        intéractifs) axé sur de nombreux thèmes.
                    </p>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->

        <!-- IMAGE LEFT -->
        <div class="column is-3 is-offset-1 is-perfectly-centered">
            <figure class="image is-300x300">
                <img src="{{ asset('svg/blueprint.svg') }}" />
            </figure>
        </div>

        <!-- CONTENT LIST -->
        <div class="column is-3 is-offset-1">
            <div class="columns is-multiline">
                <div class="column is-12 content">
                    <p>
                        <b>Une rémunération</b><br />
                        Des pourcentages de gains sur les ventes réalisées et
                        gains par réferrences.
                    </p>
                </div>

                <div class="column is-12 content">
                    <p>
                        <b>Une communauté</b><br />
                        Des discussions, des articles, destinés aux partages sur
                        le domaine du webmarketing.
                    </p>
                </div>
            </div>
        </div>
        <!-- END OF CONTENT -->
    </div>
</section>

<section class="section is-medium has-background-primary has-text-white">
    <div class="columns is-centered">
        <div class="column is-3 is-perfectly-centered">
            <figure class="image is-300x300">
                <img src="{{ asset('svg/globalization.svg') }}" />
            </figure>
        </div>
        <br />

        <div class="column is-5 is-offset-1">
            <h1 class="title is-2">Nous sommes internationnal</h1>
            <p class="is-size-5-desktop">
                Comme mode de paiement nous avons choisi <b>PayPal</b><br />
                Et pour donner la chance à tout le monde de gagner de l'argent
                et apprendre en même temps,
                <b>nous vendons des comptes PayPal vérifié</b> pour les pays où
                ce dernier n'est pas supportée
            </p>
            <br />
            <a href="{{ url('contact') }}" class="button is-primary is-inverted is-rounded"
                >En savoir plus...</a
            >
        </div>
    </div>
</section>

<section class="section is-medium container">
    <h1 class="title is-2 has-text-centered has-text-primary">
        Comment gagne-t'on de l'argent chez Ridge ?
    </h1>
    <h2 class="subtitle has-text-centered">
        C'est simple, il y a deux façons de le faire
    </h2>
    <br />
    <br />
    <!-- FIRST ROW -->
    <div class="columns is-centered">
        <div class="column is-9">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="tile is-child box has-text-centered">
                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img
                                    src="{{ asset('svg/shopping-basket.svg')}}"
                                />
                            </figure>
                        </div>
                        <br />
                        <p class="title is-4">L'affiliation</p>
                        <p>
                            En <b>revendant nos produits</b> à travers votre
                            lien de réferrence, vous gagner entre
                            <b>15% jusqu'à 25% de commission</b>, en fonction du
                            programme que vous avez choisi et acheté.
                        </p>
                    </div>
                </div>

                <div class="tile is-parent">
                    <div class="tile is-child box has-text-centered">
                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{ asset('svg/envelope.svg')}}" />
                            </figure>
                        </div>
                        <br />
                        <p class="title is-4">CPA</p>
                        <p>
                            En <b>invitant le maximum de personne</b> à
                            s'inscrire chez nous, vous gagnez entre
                            <b>0.5€ à 1€ à chaque e-mail validé</b>, en fonction
                            du programme que vous avez choisi et acheté.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DESCRIPTION -->

<section class="section is-medium has-background-primary">
    <div class="columns is-centered">
        <div class="column is-6 has-text-white">
            <h1 class="title is-2 has-text-centered">
                Que faire pour commencer à gagner de l'argent ?
            </h1>
            <p class="is-size-5-desktop has-text-centered">
                Pour commencer, vous devez choisir un programme parmi ceux listé
                ci-dessous. Vous aurez accès à <b>un ou plusieurs thèmes de
                formation</b> de votre choix (pour apprendre), et également accès à
                notre <b>programme de rémunération</b> (pour gagner de l'argent)
            </p>
        </div>
    </div>
    <br />

    <div class="columns is-centered">
        <div class="column is-11">
            <div class="tile is-ancestor">
                @foreach(App\Program::all() as $program)
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{
                                asset("svg/".strtolower($program->name).".svg")}}" />
                            </figure>
                        </div>
                        <br />

                        <p class="title is-4 has-text-centered">
                            <span class="tag is-success is-rounded is-size-6"
                                >{{ $program->price }} €</span
                            ><br />
                            Pack {{ $program->name }}
                        </p>
                        <ul>
                            <li>
                                <b>Formation :</b> {{ $program->formation }}
                            </li>
                            <br />
                            <li>
                                <b>Rémunération :</b> {{ $program->remuneration
                                }}. <br />Dont
                                <b class="has-text-warning"
                                    >{{ $program->gains_per_email }}€
                                </b>
                                par email collecté et
                                <b class="has-text-warning"
                                    >{{ $program->gains_per_sale * 100 }}%</b
                                >
                                de commission par vente
                            </li>
                            <br />
                            <li><b>Social :</b> {{ $program->social }}</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section is-medium">
    <div class="columns is-centered">
        <div class="column is-5">
            <h1 class="title is-2 has-text-primary">Vous avez des doutes ?</h1>
            <h2 class="subtitle">Vous pouvez lire notre FAQ pour plus de détails</h2>
            <br/>
            @foreach(App\Faq::all()->take(2) as $faq)
            <div class="box">
                <p>
                    <b>{{ $faq->question }}</b><br/>
                    {{ $faq->answer }}
                </p>
            </div>
            @endforeach

            <div class="field">
                <div class="control">
                    <a 
                        href="{{ url('docs') }}"
                        class="button is-primary is-rounded"
                        >Voir plus d'informations...</a>
                </div>
            </div>
        </div>

        <div class="column is-3 is-offset-1 is-perfectly-centered">
            <figure class="image is-300x300">
                <img src="{{ asset('svg/brainstorming.svg') }}" />
            </figure>
        </div>
    </div>
</section>






@endsection
