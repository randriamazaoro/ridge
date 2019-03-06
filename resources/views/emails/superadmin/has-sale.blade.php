@component('mail::message')

<p class="title is-5 has-text-centered">Bonjour !</p>
<h1 class="title is-4 has-text-primary has-text-centered">Un nouvel utilisateur vient d'acheter
	le Pack {{ $sale->product }}</h1>
<h2 class="subtitle is-5 has-text-centered">Vous gagnez {{ $sale->benefits }}€</h2>

<br/>

<div class="content">
	<ul>
		<li>
			<b>Réferrant :</b> 
			<a href="{{ url('superadmin/users/'.$referral->id) }}"
				>{{ $referral->id }}</a>
		</li>
		<li>
			<b>Programme :</b> Pack {{ $referral->program }}
		</li>
		<li>
			<b>Commission par vente :</b> {{ $referral->gains_per_sale * 100 }}%
		</li>
		<li>
			<b>Valeur réelle du produit :</b> {{ $sale->real_value }}€
		</li>
		<li>
			<b>Bénéfices :</b> {{ $sale->benefits }}€
		</li>
		<li>
			<b>Pertes :</b> {{ $sale->referral_value }}€
		</li>

	</ul> 
</div>


@component('mail::button', ['url' => url("superadmin/users/".$user->id) ])
Voir les détails du nouvel utilisateur
@endcomponent

@component('mail::button', ['url' => url("superadmin"), 'type' => 'background-color: none; color: #00ace8'])
Aller au panneau de contrôle
@endcomponent

@endcomponent
