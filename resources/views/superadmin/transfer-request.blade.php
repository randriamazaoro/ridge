@extends('layouts.min.app')

@section('title')
	 | Virement
@endsection

@section('content')
	
@component('components.header')
    @slot('url_previous') {{ url('superadmin/finances') }} @endslot 
    @slot('tag_previous') Finances @endslot 
    @slot('tag_current') Résumé de la transaction @endslot 

    Résumé de la transaction

@endcomponent

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Résumé de la transaction</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				class="button is-primary is-rounded is-fullwidth"
				>Modifier</a>
		</div>
	</div>

	<h2 class="title is-5">Details de la transaction</h2>
	<div class="box">
		<div class="columns is-vcentered">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/credit-card.svg') }}" />
				</figure>
			</div>
			<div class="column is-3">
				<p class="heading">Montant de la transaction</p>
				<p class="title">{{ $transfer_request->amount }}$</p>
			</div>
		</div>
	</div>

	<h2 class="title is-5">Details de la transaction</h2>
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
						{{ $user->paypal_address }}
					</p>
				</div>
			</div>
		</div>

<nav class="navbar is-fixed-bottom is-perfectly-centered columns">
	<div class="column is-3 has-text-centered">
		<a 
			href="{{ url('superadmin/finances/transfer-request/'.$affiliate->id.'/store') }}" 
			class="button is-rounded is-primary"
			>Valider et marquer comme payée</a>
	</div>
</nav>




@endsection