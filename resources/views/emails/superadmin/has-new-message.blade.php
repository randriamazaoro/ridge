@component('mail::message')

<div class="is-perfectly-centered">
<figure class="image is-128x128">
    <img src="{{ asset('svg/envelope-1.svg') }}" />
</figure>
</div>
<br/>

<p class="title is-5 has-text-centered">Bonjour !</p>
<h1 class="title is-4 has-text-primary has-text-centered">Vous avez un nouveau message venant de  {{ $request->name }}</h1>

<br/>
<p>
	<b>Adresse e-mail :</b> {{ $request->email }}<br/>
	<b>Objet :</b> {{ $request->subject }}<br/>
</p>
<br/>
<p class="has-text-justified">
	{!! nl2br(e($request->message)) !!}
</p>

<br/>

@component('mail::button', ['url' => url("superadmin"), 'type' => ''])
Aller au panneau de contrôle
@endcomponent

@endcomponent
