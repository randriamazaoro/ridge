@extends('layouts.min.app')

@section('title')
	 | Dashboard
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('superadmin') }} @endslot 
    @slot('tag_previous') Administration @endslot 
    @slot('tag_current') Liste des utilisateurs @endslot 

    Liste des utilisateurs

@endcomponent

<section class="section container">

	<div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                Statistiques
            </h1>
        </div>
    </div>
    <br />

	<div class="box">
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
	</div>
</section>

<hr/>

<section class="section container">
	<div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                Utilisateurs
            </h1>
        </div>
    </div>
    <br />
	<div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/businessman.svg') }}" />
				</figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth is-hoverable">
            <thead>
			<tr>
				<th>Id</th>
				<th>Nom d'utilisateur</th>
				<th>Adresse Email</th>
				<th>Status</th>
				<th></th>
			</tr>
			</thead>

			<tbody>
			@forelse($users as $user)
			<tr>
				<td><b>{{ $user->id }}</b></td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td><b class="tag is-rounded {{ $user->status =='Actif' ? 'is-success' : 'is-warning' }}">{{ $user->status }}</b></td>
				<td>
					<a 
						href="{{ url('superadmin/users/'.$user->id) }}"
						target="_blank" 
						>
						<span class="icon">
							<i class="material-icons has-text-primary is-size-3">open_in_new</i>
						</span></a
					>
				</td>
			</tr>
			@empty
			<tr>
				<td>Vous n'avez encore référé personne</td>
			</tr>
			@endforelse
			</tbody>

					
		</table>
		
	</div>
	{{ $users->links() }}
</div>
</div>
</div>
</section>

@endsection