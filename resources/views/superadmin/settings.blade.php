@extends('layouts.min.app')

@section('title')
	| Paramètres du compte
@endsection

@section('content')


@component('components.header')
    @slot('url_previous') {{ url('superadmin') }} @endslot 
    @slot('tag_previous') Administration @endslot 
    @slot('tag_current') Paramètres du compte @endslot 

    Paramètres du compte

@endcomponent

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Paramètres générales</h1>
		</div>
	</div>
	<br/>

	<h2 class="title is-4">Données de connection</h2>
	<div class="box">
		<div class="columns content">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/login.svg') }}" />
				</figure>
			</div>

			<div class="column is-4">
				<p>
					<b>Nom d'utilisateur</b><br />
					{{ $user->name }} - <a onclick="toggleActiveClass('#name')">Changer</a>
				</p>

				<p>
					<b>Adresse email</b><br />
					{{ $user->email }} - <a onclick="toggleActiveClass('#email')">Changer</a>
				</p>
			</div>

			<div class="column is-4">
				<p>
					<b>Mot de passe</b><br />
					******* - <a onclick="toggleActiveClass('#password')">Changer</a>
				</p>
			</div>
		</div>
	</div>

	<h2 class="title is-4">Moyen de paiement</h2>
	<div class="box">
		<div class="columns is-vcentered content">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/credit-card.svg') }}" />
				</figure>
			</div>

			<div class="column is-4">
				<p>
					<b>Adresse Paypal</b><br />
					{{ $user->paypal_address }} - <a onclick="toggleActiveClass('#paypal')">Changer</a>
				</p>
			</div>
		</div>
	</div>

</section>

@include('superadmin.partials.settings')






@endsection