@extends('layouts.app')

@section('title')
	| Nous contacter
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('/') }} @endslot 
    @slot('tag_previous') Pade d'acceuil @endslot 
    @slot('tag_current') Nous contacter @endslot 

    Nous contacter

@endcomponent

<section class="section">
	<div class="columns is-centered is-vcentered">
		<!-- LEFT TEXT -->
		<div class="column is-4">
			<!-- TEXT -->
			<div class="content">
				<h1 class="title has-text-primary">Envoyer un mail</h1>
				<p>
					Vous avez des questions ? Vous souhaitez avoir beaucoup plus d'informations ?<br/>
					Envoyez-nous un email et nous allons vous contacter le plus vite possible.
				</p>
			</div>
		</div>
		<!-- RIGHT IMAGE -->
		<div class="column is-4 is-offset-1">
			<div class="box">

				<div class="is-perfectly-centered">
					<figure class="image is-128x128">
						<img src="{{ asset('svg/envelope-1.svg') }}">
					</figure>
				</div>
				<br/>

			<form action="{{ url('/contact') }}" method="POST">
				@csrf
				<div class="field">
					<label class="label">Nom</label>
					<div class="control">
						<input
							type="text"
							name="name"
							class="input is-rounded {{ $errors->has('name') ? 'is-danger' : '' }}"
							placeholder="Nom..."
							value="{{ old('name') }}"
							required
							autofocus
						/>
					</div>
					@if($errors->has('name'))
					<span class="has-text-danger">{{ $errors->first('name') }}</span>
					@endif
				</div>

				<div class="field">
					<label class="label">Adresse e-mail</label>
					<div class="control">
						<input
							type="text"
							name="email"
							class="input is-rounded {{ $errors->has('email') ? 'is-danger' : '' }}"
							placeholder="Adresse e-mail..."
							value="{{ old('email') }}"
							required
						/>
					</div>
					@if($errors->has('email'))
					<span class="has-text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="field">
					<label class="label">Objet</label>
					<div class="control">
						<input
							type="text"
							name="subject"
							class="input is-rounded {{ $errors->has('subject') ? 'is-danger' : '' }}"
							placeholder="Objet..."
							value="{{ old('subject') }}"
							required
						/>
					</div>
					@if($errors->has('subject'))
					<span class="has-text-danger"
						>{{ $errors->first('subject') }}</span
					>
					@endif
				</div>

				<div class="field">
					<label class="label">Message</label>
					<div class="control">
						<textarea
							name="message"
							class="textarea {{ $errors->has('message') ? 'is-danger' : '' }}"
							placeholder="Votre message..."
							required
						>{{ old('message') }}</textarea>
					</div>
					@if($errors->has('message'))
					<span class="has-text-danger"
						>{{ $errors->first('message') }}</span
					>
					@endif
				</div>

				<br/>

				<div class="field">
					<div class="control">
						<input
							type="submit"
							class="button is-primary is-fullwidth is-rounded"
							value="Envoyer"
						/>
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>
@endsection