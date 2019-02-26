<nav
	class="navbar is-fixed-top"
	role="navigation"
	aria-label="main navigation"
	id="is-fixed"
	style="top:-4rem"
>
	<div class="container">
		<div class="navbar-brand">
			<a href="{{ route('home') }}" class="navbar-item">
					<img src="{{ asset('svg/logo.svg') }}" width="75px">
			</a>

			<a
				role="button"
				class="navbar-burger burger"
				aria-label="menu"
				aria-expanded="false"
				data-target="navbarBasicExample"
			>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

		<div id="navbar-menu" class="navbar-menu">
			<div class="navbar-start">
				<a href="{{ url('/') }}" class="navbar-item"> Page d'acceuil </a>

				<a href="{{ url('docs') }}" class="navbar-item"> Documentation </a>

				<a href="{{ url('blog') }}" class="navbar-item"> Blog </a>

				<a href="{{ url('contact') }}" class="navbar-item"> Contact </a>
			</div>

			<div class="navbar-end">
				@auth

				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link" href="{{ url('admin') }}">
						<b>Bienvenue, {{ Auth::user()->name }}</b>
					</a>
					<div class="navbar-dropdown is-boxed">

						@if(Auth::user()->status == 'Actif')
						<a href="{{ url('admin') }}" class="navbar-item"> Mon Espace </a>
						<a href="{{ url('admin/settings') }}" class="navbar-item"> Paramètres de mon compte </a>

						@else
						<a href="{{ url('admin/initiation') }}" class="navbar-item"> Initiation </a>

						@endif
						<hr class="navbar-divider"/>
						
						<a class="navbar-item" onclick="toggleActiveClass('#logout')"> Se déconnecter </a>
					</div>
				</div>
				@endauth				

				@guest
				<div class="navbar-item">
					<div class="buttons">
						<a class="button is-rounded is-primary is-outlined" href="{{ url('login') }}"> Se connecter </a>

						<a class="button is-rounded is-primary" href="{{ url('register') }}"> Créer un compte </a>
					</div>
				</div>
				@endguest
			</div>
		</div>
	</div>
</nav>
