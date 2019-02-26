<nav
	class="navbar"
	role="navigation"
	aria-label="main navigation"
>
	<div class="container">
		<div class="navbar-brand">
			<a href="" class="navbar-item">
				Brand
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

		<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-end">
				<div class="navbar-item">
					<div class="buttons">
						<a class="button" href="{{ url('/login') }}"> Se connecter </a>

						<a class="button is-primary" href="{{ url('/register') }}"> Créer un compte </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
