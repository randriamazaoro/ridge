@component('mail::message')

<p class="title is-5 has-text-centered">Bonjour {{ $user->first_name }} !</p>
<h1 class="title is-4 has-text-primary has-text-centered">Votre demande de virement nous a été transmise.</h1>
<h2 class="subtitle is-5 has-text-centered">Montant : {{ $transfer_request->amount }}€</h2>

<br/>




@component('mail::button', ['url' => url("admin") ])
Aller au panneau de contrôle
@endcomponent

@endcomponent

