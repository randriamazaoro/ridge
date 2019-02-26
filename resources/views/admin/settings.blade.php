@extends('layouts.min.app')

@section('title')
	| Paramètres du compte
@endsection

@section('content')


@component('components.header')
    @slot('url_previous') {{ url('admin') }} @endslot 
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

	<br>

	<div class="columns">
		<div class="column is-5">
			<h1 class="title is-4">Données personnelles</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				onclick="toggleActiveClass('#personal')" 
				class="button is-primary is-rounded is-fullwidth"
				>Mettre à jour</a>
		</div>
	</div>
	<div class="box">
		<div class="columns content">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/curriculum.svg') }}" />
				</figure>
			</div>

			<div class="column is-4">
				<p>
					<b>Nom</b><br />
					{{ $user->last_name }}
				</p>

				<p>
					<b>Prénom</b><br />
					{{ $user->first_name }}
				</p>
			</div>

			<div class="column is-4">

				<p>
					<b>Age</b><br />
					{{ $user->age }}
				</p>

				<p>
					<b>Sexe</b><br />
					{{ $user->gender }}
				</p>

			</div>
		</div>
	</div>

	<br>

	<div class="columns">
		<div class="column is-5">
			<h1 class="title is-4">Données de contact</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				onclick="toggleActiveClass('#contact')" 
				class="button is-primary is-rounded is-fullwidth"
				>Mettre à jour</a>
		</div>
	</div>
	<div class="box">
		<div class="columns content">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/contact.svg') }}" />
				</figure>
			</div>

			<div class="column is-4">
				<p>
					<b>Adresse e-mail de contact</b><br />
					{{ $user->email_contact }}
				</p>

				<p>
					<b>Numéro de téléphone</b><br />
					{{ $user->phone }}
				</p>
			</div>

			<div class="column is-4">

				<p>
					<b>Pays</b><br />
					{{ $user->country }}
				</p>

				<p>
					<b>Ville</b><br />
					{{ $user->city }}
				</p>

			</div>
		</div>
	</div>
</section>

<hr/>

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Paramètres relatif au programme de rémunération</h1>
		</div>
	</div>

	<br>

	<div class="columns">
		<div class="column is-5">
			<h1 class="title is-4">Programme</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('admin/settings/upgrade') }}"
				class="button is-primary is-rounded is-fullwidth"
				>Mettre à niveau</a>
		</div>
	</div>
	@component('components.program-min') 
		@slot('program') {{ $program->name }} @endslot
		@slot('price') {{ $program->price }} @endslot
		@slot('formation') {{ $program->formation }} @endslot
		@slot('remuneration') {{ $program->remuneration }} @endslot
		@slot('gains_per_email') {{ $program->gains_per_email}} @endslot
		@slot('gains_per_sale') {{ $program->gains_per_sale * 100}} @endslot
		@slot('social') {{ $program->social }} @endslot
		@slot('advantages') {{ $program->advantages }} @endslot
	@endcomponent 

	<br />

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

@include('modals.settings')






@endsection