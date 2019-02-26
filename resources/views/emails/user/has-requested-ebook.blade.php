@component('mail::message')

<div class="is-perfectly-centered">
	<figure class="image is-128x128">
		<img src="{{ asset('svg/mini.svg') }}" />
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

@component('mail::button', ['url' => url("newsletter/download/ebook/{$token}") ])
Télécharger le livre
@endcomponent

@component('mail::button', ['url' => url('register'), 'type' =>'is-outlined' ])
S'inscrire chez Ridge
@endcomponent

@endcomponent
