@extends('layouts.min.app')

@section('title')
	 | Dashboard
@endsection

@section('content')
	
@component('components.header')
    @slot('url_previous') {{ url('admin/initiation') }} @endslot 
    @slot('tag_previous') Administration @endslot 
    @slot('tag_current') Résumé de l'initiation @endslot 

    Résumé de l'initiation

@endcomponent

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Résumé de l'initiation</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('admin/initiation') }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Modifier</a>
		</div>
	</div>
	<br />

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
				<p class="title">{{ $program->price }}$</p>
			</div>
		</div>
	</div>

	<h2 class="title is-5">Données personnelles</h2>
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
					{{ $request->last_name }}
				</p>

				<p>
					<b>Prénom</b><br />
					{{ $request->first_name }}
				</p>

			</div>

			<div class="column is-4">

				<p>
					<b>Age</b><br />
					{{ $request->age }}
				</p>

				<p>
					<b>Sexe</b><br />
					{{ $request->gender }}
				</p>

			</div>
		</div>
	</div>

	<br />
	<h2 class="title is-5">Données de contact</h2>
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
					{{ $request->email_contact }}
				</p>

				<p>
					<b>Numéro de contact</b><br />
					{{ $request->phone }}
				</p>

			</div>

			<div class="column is-4">

				<p>
					<b>Pays</b><br />
					{{ $request->country }}
				</p>

				<p>
					<b>Ville</b><br />
					{{ $request->city }}
				</p>

			</div>
		</div>
	</div>

	<br />
	<h2 class="title is-5">Choix de programme</h2>
		@component('components.program-min') 
			@slot('program') {{ $program->name }} @endslot
			@slot('price') {{ $program->price }} @endslot
			@slot('formation') {{ $program->formation }} @endslot
			@slot('remuneration') {{ $program->remuneration }} @endslot
			@slot('gains_per_email') {{ $program->gains_per_email }} @endslot
			@slot('gains_per_sale') {{ $program->gains_per_sale * 100 }} @endslot
			@slot('social') {{ $program->social }} @endslot
		@endcomponent 	

	<br />
	<h2 class="title is-5">Choix de theme</h2>
	<div class="box">
		<div class="columns content {{ $request->program == 'Mini' ? 'is-vcentered' : '' }}">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/list.svg') }}" />
				</figure>
			</div>

			@if($request->program == "Mini")
			<div class="column is-4">
				<p>
					<b>1er choix</b><br />
					{{ App\Theme::where('id',$request->theme_mini)->first()->title }}
				</p>
			</div>

			@elseif($request->program == "Maxi")
			<div class="column is-4">
				<p>
					<b>1er choix</b><br />
					{{ App\Theme::where('id',$request->theme_maxi_1)->first()->title }}
				</p>

				<p>
					<b>2ème choix</b><br />
					{{ App\Theme::where('id',$request->theme_maxi_2)->first()->title }}
				</p>
			</div>

			<div class="column is-4">
				<p>
					<b>3ème choix</b><br />
					{{ App\Theme::where('id',$request->theme_maxi_3)->first()->title }}
				</p>
			</div>

			@elseif($request->program == "Ultra")
				@foreach(App\Theme::all()->chunk(7) as $chunk)
				<div class="column is-4">
					@foreach($chunk as $theme)
					<p>
						{{ $theme->title}}
					</p>
					@endforeach
				</div>
				@endforeach

			@endif


		</div>
	</div>
</section>



<nav class="navbar is-fixed-bottom is-perfectly-centered columns">
	<div class="column is-3 has-text-centered">
		<a 
			href="{{ url('paypal/express-checkout') }}" 
			class="button is-rounded is-primary"
			>Valider et proceder au paiement</a>
	</div>
</nav>




@endsection