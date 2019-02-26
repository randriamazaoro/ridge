@extends('layouts.min.app')

@section('title')
| Page introuvable
@endsection

@section('content')
<section class="hero is-fullheight">
	<div class="hero-body">
		<div class="container">
		<div class="columns is-centered">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-256x256">
					<img src="{{ asset('svg/target.svg') }}">
				</figure>
			</div>
		</div>

		<div class="columns is-centered has-text-centered">
			<div class="column is-8">
				<p class="title">
				Oops ! 
				</p>
				<p class="subtitle">
					La page que vous recherchez est introuvable.
				</p>

				<a class="button is-link is-medium is-rounded" href="{{ url('/') }}">Retourner à la Page d'Acceuil</a>
			</div>
		</div>
	</div>


	</div>
</section>
@endsection


