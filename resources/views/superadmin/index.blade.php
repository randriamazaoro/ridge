@extends('layouts.min.app')

@section('title')
	 | Dashboard
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
			<h1 class="title has-text-primary">Finances</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('superadmin/finances') }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Gerer</a>
		</div>
	</div>

	<br/>

    <a href="{{ url('superadmin/finances') }}" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics-1.svg') }}" />
                </figure>
            </div>

            <div class="column is-3">
                <p class="heading">Total des chiffres de ventes</p>
                <p class="title">{{ App\Sale::sum('real_value') }}$</p>
            </div>

            <div class="column is-3">
                <p class="heading">Bénéfices</p>
                <p class="title">{{ App\Sale::sum('benefits') - App\Email::sum('referral_value') }}$</p>
            </div>

            <div class="column is-3">
                <p class="heading">Pertes</p>
                <p class="title">
                    {{ 
                        App\Sale::sum('referral_value') 
                        + App\Email::sum('referral_value') 
                    }}$
                </p>
            </div>
            
        </div>
    </a>
</section>

    <hr/>

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Utilisateurs</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('superadmin/users') }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Gerer</a>
		</div>
	</div>

	<br/>

	<a href="{{ url('superadmin/users') }}" class="box">
		<div class="columns is-vcentered">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/office-block.svg') }}" />
				</figure>
			</div>
			<div class="column is-3">
				<p class="heading">Inscrits</p>
				<p class="title">{{ App\User::count() }}</p>
			</div>
			<div class="column is-3">
				<p class="heading">Actifs</p>
				<p class="title">{{ $affiliates->count() }}</p>
			</div>
		</div>
	</a>
</section>

	<hr />

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Programmes et formations</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('superadmin/programs') }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Gerer</a>
		</div>
	</div>

	<br/>

	<a href="{{ url('superadmin/programs') }}" class="box">
		<div class="columns is-vcentered">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/ultra.svg') }}" />
				</figure>
			</div>
			<div class="column is-3">
				<p class="heading">Programmes</p>
				<p class="title">{{ App\Program::count() }}</p>
			</div>
			<div class="column is-3">
				<p class="heading">Themes</p>
				<p class="title">{{ App\Theme::count() }}</p>
			</div>
		</div>
	</a>

</section>

<hr/>

<section class="section container">
	<div class="columns">
		<div class="column is-5">
			<h1 class="title has-text-primary">Blog</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url('superadmin/blog') }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Gerer</a>
		</div>
	</div>

	<br/>

	<a href="{{ url('superadmin/blog') }}" class="box">
		<div class="columns is-vcentered">
			<div class="column is-3 is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/orders.svg') }}" />
				</figure>
			</div>
			<div class="column is-3">
				<p class="heading">Sujets</p>
				<p class="title">{{ App\Post::count() }}</p>
			</div>
			<div class="column is-3">
				<p class="heading">Commentaires</p>
				<p class="title">{{ App\Comment::count() }}</p>
			</div>
		</div>
	</a>


</section>

@endsection