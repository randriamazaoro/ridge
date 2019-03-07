@extends('layouts.min.app')

@section('title')
	 | Administration
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('/') }} @endslot 
    @slot('tag_previous') Pade d'acceuil @endslot 
    @slot('tag_current') Administration @endslot 

    Administration

@endcomponent

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                {{ $user->first_name }} {{ $user->last_name }}
            </h1>
        </div>
        <div class="column is-2 is-offset-5">
            <a
                href="{{ url('admin/settings') }}"
                class="button is-primary is-rounded is-fullwidth"
                >Mettre à jour</a
            >
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns content">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    @if($user->gender == "homme")
                    <img src="{{ asset('svg/businessman.svg') }}" />

                    @else <img src="{{ asset('svg/businesswoman.svg') }}" />

                    @endif
                </figure>
            </div>
            <div class="column is-4">
                <p>
                    <b>Nom d'utilisateur:</b><br />
                    {{ $user->name }}
                </p>
                <p>
                    <b>Adresse email:</b><br />
                    {{ $user->email }}
                </p>
                <p>
                    <b>Adresse Paypal:</b><br />
                    {{ $user->paypal_address }}
                </p>
                <p>
                    <b>Inscrit le:</b><br />
                    {{ $user->created_at }}
                </p>
            </div>
            <div class="column is-4">
                <p>
                    <b>Age:</b><br />
                    {{ $user->age }}
                </p>
                <p>
                    <b>Sexe:</b><br />
                    {{ $user->gender }}
                </p>
                <p>
                    <b>Pays:</b><br />
                    {{ $user->country }}
                </p>
            </div>
        </div>
    </div>
</section>

<hr/>

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Demandes</h1>
        </div>
        <div class="column is-4 is-offset-3">
            @isset($transfer_request)
            <a
                id="delete-transfer-url-{{ $transfer_request->id }}"
                data-url="{{ url('admin/transfer-request/delete') }}"
                onclick="deleteModal('transfer','{{ $transfer_request->id }}')"
                class="button is-primary is-rounded is-outlined is-fullwidth"
                >Annuler ma demande de virement</a
            >
            @endisset @empty($transfer_request) @if($approuved_sales_value +
            $approuved_emails_value > 50)
            <a
                class="button is-primary is-rounded is-fullwidth"
                href="{{ url('admin/transfer-request') }}"
                >Demander un virement</a
            >
            @else
            <button
                class="button is-primary is-rounded is-outlined is-fullwidth tooltip is-tooltip-multiline"
                data-tooltip="Vous pouvez demander un virement quand vous aurez plus de 50$ de gains Approuvés"
                disabled
            >
                Demander un virement
            </button>
            @endif @endempty
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/money-bag.svg') }}" />
                </figure>
            </div>
            <div class="column">
                @isset($transfer_request)
                <p class="title is-5">
                    Vous avez demandé un virement de
                    <span class="has-text-warning">
                        {{ $transfer_request->amount }}$ </span
                    >.
                </p>
                <p class="subtitle is-6">
                    Votre demande est en cours de traitement.
                </p>
                @endisset @empty($transfer_request)
                <p class="title is-5">
                    Vous n'avez pas encore demandé un virement.
                </p>
                <p class="subtitle is-6">
                    A partir de 50$ en gains approuvés vous pouvez déjà demander
                    un virement.
                </p>
                @endempty
            </div>
        </div>
    </div>
</section>

<hr />

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Statistiques</h1>
        </div>
    </div>
    <br />
    <h2 class="title is-4">Statistiques de vente</h2>
    <a href="#details" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics-1.svg') }}" />
                </figure>
            </div>

            <div class="column is-3">
                <p class="heading">Approuvés</p>
                <p class="title">
                    {{ $approuved_sales_value + $approuved_emails_value }} €
                </p>
            </div>

            <div class="column is-3">
                <p class="heading">En attente</p>
                <p class="title">{{ $pending_emails_value }} €</p>
            </div>

            <div class="column is-3">
                <p class="heading">Payées</p>
                <p class="title">
                    {{ $paid_emails_value + $paid_sales_value }} €
                </p>
            </div>
        </div>
    </a>
    <br />
    <h2 class="title is-4">Résumé des activités</h2>
    <a href="#details" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics.svg') }}" />
                </figure>
            </div>

            <div class="column is-3">
                <p class="heading">Ventes réalisées</p>
                <p class="title">{{ $sales->count() }}</p>
            </div>

            <div class="column is-3">
                <p class="heading">Email Collectées</p>
                <p class="title">{{ $emails->count() }} / <small class="tooltip is-tooltip-multiline" data-tooltip="Ceci est la le nombre d'adresse e-mail que vous pouvez collecter et qui sera ajouté à votre solde. Si vous avez réussi à collecter plus que ce nombre, vos gains seront en attente et vous devez vendre au minimum un Pack Maxi (+5) ou un Pack Ultra (+10) pour faire augmenter votre limite. Après chaque retrait, cette dernière va être soustraite par le nombre d'e-mails approuvées que vous avez collecté.">{{ $affiliate->gains_per_email_limit }}</small></p>
            </div>
        </div>
    </a>
</section>
<hr />
<section class="section container">
    <div class=" columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Programme</h1>
        </div>
        <div class="column is-2 is-offset-5">
            <a
                href="{{ url('admin/settings/upgrade') }}"
                class="button is-primary is-rounded is-fullwidth"
                >Mettre à niveau</a
            >
        </div>
    </div>
    <br />
    <h2 class="title is-4">Rémunération</h2>
    <div class="box">
        <div class="columns">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/'.strtolower($affiliate->program).'.svg') }}" />
                </figure>
            </div>
            <div class="column is-4 content">
                <p>
                    <b>Programme :</b><br />
                    Pack {{ $affiliate->program }}
                </p>
                <p>
                    <b>Commission par vente :</b><br />
                    {{ $affiliate->gains_per_sale * 100}}%
                </p>
                <p>
                    <b>Commission par emails collectées :</b><br />
                    {{ $affiliate->gains_per_email }} €
                </p>
            </div>
            <div class="column is-4 content">
                <p>
                    <b>Votre lien de référence:</b><br />
                    <a href="{{ url('register?ref='.$affiliate->id) }}">
                        {{ config('app.url') }}/register?ref={{$affiliate->id}}
                    </a>
                </p>
                <p>
                    <b>Numéro d'affilié :</b><br />
                    {{ $affiliate->id }}
                </p>
                <p>
                    <b>Debut du programme :</b><br />
                    {{ $affiliate->created_at }}
                </p>
            </div>
        </div>
    </div>
    <br />
    <h2 class="title is-4" id="themes">Formation</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/list.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        @if($affiliate->program == "Ultra") @foreach($themes as
                        $owned_theme)
                        <tr>
                            <td>{{ $owned_theme->title }}</td>
                            <td>{{ $owned_theme->description }}</td>
                            <td>
                                <a
                                    href="{{ $owned_theme->url }}"
                                    target="_blank"
                                >
                                    <div class="icon is-large">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >get_app</i
                                        >
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach @else @foreach($owned_themes as
                        $owned_theme)
                        <tr>
                            <td>{{ $owned_theme->theme->title }}</td>
                            <td>{{ $owned_theme->theme->description }}</td>
                            <td>
                                <a
                                    href="{{ $owned_theme->theme->url }}"
                                    target="_blank"
                                >
                                    <div class="icon is-large">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >get_app</i
                                        >
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach @endif
                    </table>
                </div>
                {{ $affiliate->program == "Ultra" ?
                $themes->fragment('themes')->links() :
                $owned_themes->fragment('themes')->links() }}
            </div>
        </div>
    </div>
</section>
<hr />
<section class="section container">
    <h1 class="title has-text-primary" id="details">Ventes et Références</h1>
    <br />
    <h2 class="title is-4" id="emails">Références</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/envelope.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Valeur</th>
                            <th>Status</th>
                        </tr>
                        @forelse($emails as $email)
                        <tr>
                            <td>
                                <b>{{ $email->created_at }}</b>
                            </td>

                            <td>
                                <b class="has-text-success">
                                    {{ $email->referral_value }} €
                                </b>
                            </td>

                            <td>
                                <b class="tag is-rounded {{ $email->tag }}">
                                    {{ $email->status }}
                                </b>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Vous n'avez encore référé personne</td>
                        </tr>
                        @endforelse 
                    </table>

                </div>
                {{ $emails->fragment('emails')->links() }}
            </div>
        </div>
    </div>
    <h2 class="title is-4" id="sales">Ventes</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/shopping-basket.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Produit</th>
                            <th>Valeur</th>
                            <th>Status</th>
                        </tr>
                        @forelse($sales as $sale)
                        <tr>
                            <td><b>{{ $sale->created_at }}</b></td>
                            <td>Pack {{ $sale->product }}</td>
                            <td>
                                <b class="has-text-success">
                                    {{ $sale->referral_value }} €
                                </b>
                            </td>
                            <td>
                                <b
                                    class="tag is-rounded {{ $sale->tag }}"
                                    >{{ $sale->status }}</b
                                >
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Vous n'avez pas encore effectué des ventes</td>
                        </tr>
                        @endforelse 
                    </table>
                </div>
                {{ $sales->fragment('sales')->links() }}
            </div>
        </div>
    </div>
</section>



@endsection