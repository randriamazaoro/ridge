@component('mail::message')

<div class="content">

		<p><b>Bonjour {{ $user->first_name }}</b>,</p>

		<p>Encore une fois, bienvenue sur Ridge ! On est ravis de constater que vous avez pris des mesures pour améliorer votre statut de membre et faire passer votre mode de vie numérique au niveau supérieur en choisissant un de nos packs.</p>
		
		<p>En tant que nouveau membre, nous comprenons que tout peut sembler un peu écrasant et que vous pensez peut-être «à quoi est-ce que je me suis inscrit, exactement?».</p>
		
		<p>Ridge est une plateforme de style de vie numérique où vous pouvez gérer votre propre entreprise de marketing numérique tout en gagnant des commissions de parrainage pour chaque personne qui crée son compte d’abonnement gratuit à RIdge.</p>
		
		<p>Nous avons même inclus une série de bonus incroyables pour vous afin que votre style de vie numérique soit opérationnel et prêt à générer des revenus numériques dès demain.</p>
		
		@if($affiliate->program == "Mini")
		<p>Ce Pack Mini que vous avez choisi vous octroie le droit d’accéder à une (1) formation gratuite parmi notre large palette et vous permet déjà de toucher plus de 15% de commission à chaque vente que vous faites. Vous pouvez monter en gamme (en Maxi ou Ultra) à tout moment en payant la différence.</p>
		
		@elseif($affiliate->program == "Maxi")
		<p>Ce Pack Maxi que vous avez choisi vous octroie le droit d’accéder à trois (3) formations gratuites parmi notre large palette et vous permet déjà de toucher plus de 25% de commission à chaque vente que vous faites. Vous pouvez monter en gamme (en Ultra) à tout moment en payant la différence.</p>

		@elseif($affiliate->program == "Ultra")
		<p>Ce Pack Ultra que vous avez choisi vous octroie le droit d’accéder à toutes les formations parmi notre large palette et vous permet déjà de toucher plus de 15% de commission à chaque vente que vous faites.</p>
		@endif
		
		
		<p>Veuillez contacter notre équipe d'assistance si vous avez besoin d’aide !<br/>
		<b>C'est un plaisir de vous avoir à bord !</b></p>
		
		
</div>
<br/>

		


@component('mail::button', ['url' => url("admin") ]) 
Aller au panneau de contrôle 
@endcomponent

@endcomponent
