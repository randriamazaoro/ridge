@component('mail::message')

<p class="title is-5 has-text-centered">Bonjour {{ $user->first_name }} !</p>
<h1 class="title is-4 has-text-primary has-text-centered">Nous venons de vous transférer <br/> {{ $transfer_request->amount }}€ sur votre compte.</h1>
<h2 class="subtitle is-6 has-text-centered">Vous allez pouvoir visionner cela prochainement.</h2>

<br/>




@component('mail::button', ['url' => url("admin") ])
Aller au panneau de contrôle
@endcomponent

@endcomponent

