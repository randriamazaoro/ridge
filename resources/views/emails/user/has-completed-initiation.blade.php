@component('mail::message')

<div class="is-perfectly-centered">
	<figure class="image is-128x128">
		<img src="{{ asset('svg/rocket.svg') }}" />
	</figure>
</div>

<div class="has-text-centered">
<p class="title has-text-primary">Felicitations !!!</p>
<p>
	Vous avez terminé l'étape d'initiation.<br />
	Vous pouvez dersormais:
</p>
</div>

<div class="content">
<ul>
	<li>Participer à notre programme d'affiliation</li>
	<li>Réferrer des nouveaux utilisateurs</li>
	<li>Télécharger vos formations sur les themes que vous avez choisi</li>
</ul>
</div>
<br/>

		


@component('mail::button', ['url' => url("admin") ]) 
Aller au panneau de contrôle 
@endcomponent

@endcomponent
