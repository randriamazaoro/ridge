@component('mail::message')

<div class="is-perfectly-centered">
	<figure class="image is-128x128">
		<img src="{{ asset('svg/security.svg') }}" />
	</figure>
</div>
<br />

<h1 class="title is-4 has-text-primary has-text-centered">
	Réinitialiser votre mot de passe?
</h1>

<p class="has-text-justified">
	Si vous avez demandé à reinitialiser le mot de passe pour votre compte chez
	nous, cliquez le bouton ci-dessous. Si vous n'avez pas fait cette demande,
	ignorez cet email.
</p>
<br />

@component('mail::button', ['url' => $url ])
Réinitialiser mon mot de passe
@endcomponent

@endcomponent
