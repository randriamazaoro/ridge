@extends('layouts.min.app')

@section('title')
	 | Dashboard
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('superadmin/users') }} @endslot 
    @slot('tag_previous') Liste des utilisateurs @endslot 
    @slot('tag_current') Détails de l'utilisateur @endslot 

    Détails de l'utilisateur

@endcomponent

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                {{ $user->name }} 
                <span class="tag is-warning is-rounded">Inactif</span>
            </h1>
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns content">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/businessman.svg') }}" />
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

            </div>
            <div class="column is-4">
                <p>
                    <b>Adresse IP:</b><br />
                    {{ $user->ip_address }}
                </p>

                <p>
                    <b>Inscrit le:</b><br />
                    {{ $user->created_at }}
                </p>
            </div>
        </div>
    </div>

    <br />
    <div class="columns">
        <div class="column is-5">
            <h1 class="title is-4">Réferrence</h1>
        </div>
        <div class="column is-3 is-offset-4">
            <a 
                href="{{ url('superadmin/users/'.$user->referred_by) }}" 
                class="button is-primary is-rounded is-fullwidth"
                >Voir plus venant du referrant</a>
        </div>
    </div>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/envelope.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <p class="title is-5">Cet utilisateur a été réferré par l'affilié portant le numéro <span class="has-text-warning">{{ $user->referred_by }}</span>.</p>
            </div>
        </div>
    </div>
</section>
@endsection