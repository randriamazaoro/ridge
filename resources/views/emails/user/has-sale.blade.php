@component('mail::message')

<div class="is-perfectly-centered">
<figure class="image is-128x128">
    <img src="{{ asset('svg/shopping-basket.svg') }}" />
</figure>
</div>
<br/>

<p class="title is-5 has-text-centered">Bonjour {{ $user->first_name }}!</p>
<h1 class="title is-4 has-text-primary has-text-centered">Un de vos filleul a acheté
	<br/> le Pack {{ $sale->product }}</h1>
<h2 class="subtitle is-5 has-text-centered">Vous gagnez {{ $sale->referral_value }}€</h2>

<br/>

<div class="content">
	<ul>
		<li>
			<b>Votre programme :</b> Pack {{ $affiliate->program }}
		</li>
		<li>
			<b>Vos commission par vente :</b> {{ $affiliate->gains_per_sale * 100 }}%
		</li>
		<li>
			<b>Valeur réelle du produit :</b> {{ $sale->real_value }}€
		</li>

	</ul> 
</div>


@component('mail::button', ['url' => url("admin") ])
Aller au panneau de contrôle
@endcomponent

@endcomponent
