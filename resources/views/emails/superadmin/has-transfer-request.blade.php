@component('mail::message')

<div class="is-perfectly-centered">
<figure class="image is-128x128">
    <img src="{{ asset('svg/money-bag.svg') }}" />
</figure>
</div>

<br/>

<p class="title is-5 has-text-centered">Bonjour !</p>
<h1 class="title is-4 has-text-primary has-text-centered">Vous avez une nouvelle demande de virement !</h1>
<h2 class="subtitle is-5 has-text-centered">Montant : {{ $transfer_request->amount }}€</h2>

<br/>


@component('mail::button', ['url' => url("superadmin/finances") ])
Gèrer les finances
@endcomponent

@component('mail::button', ['url' => url("superadmin"), 'type' => 'is-outlined' ])
Aller au panneau de contrôle
@endcomponent

@endcomponent

