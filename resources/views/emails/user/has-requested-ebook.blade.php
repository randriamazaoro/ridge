@component('mail::message')

<div class="content">
	<p><b>Bonjour</b>,</P>

	<p>Vous avez entendu le mot <i>"Affiliation"</i> quelque part, surtout sur Ridge, mais jusque là vous ne savez pas encore ce que cela signifie.</p>
	<p>Comme un avant goût du monde qui vous attend, nous vous offrons gratuitement un guide qui vous montrera tous ce que vous devez savoir avant de vous lancer.</p>
	<p>N'oubliez pas d'ouvrir un compte chez nous :)</p>
</div>
<br />

@component('mail::button', ['url' => "https://www.ridge.work/ebook/SuperAffiliation.pdf" ])
Télécharger le livre
@endcomponent

@component('mail::button', ['url' => url('register'), 'type' =>'is-outlined' ])
S'inscrire chez Ridge
@endcomponent

@endcomponent
