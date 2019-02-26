@component('mail::message')

<div class="is-perfectly-centered">
<figure class="image is-128x128">
    <img src="{{ asset('svg/handshake.svg') }}" />
</figure>
</div>
<br/>

<h1 class="title is-4 has-text-primary has-text-centered">Bienvenue chez Ridge</h1>

<p class="has-text-justified"> 

        Préparez-vous à gagner une tonne d'argent en monétisant votre trafic grâce à nos offres génératrices de revenus dans tous les secteurs.<br/><br/>
        Vous apprendrez tout ce que vous devez savoir sur le marketing d'affiliation. <br/><br/>
        
        En attendant, pourquoi ne pas commencer à explorer notre plateforme et à jeter un coup d'œil à nos offres incroyables ?<br/><br/>
        
        Connectez-vous à votre compte et ayez accès à un e-book gratuit pour vous mettre dans le bain. Si vous ne l'avez pas déjà fait, rejoignez notre groupe d’affiliés Ridge sur Facebook :  Groupe Ridge Officiel.<br/><br/>
         
        Nous vous remercions encore de faire partie de la famille Ridge et nous espérons que vous n’aurez rien de moins qu’un parcours fructueux et lucratif avec nous!<br/><br/>
         
</p>
<br/>

@component('mail::button', ['url' => $url ])
Verifier mon compte
@endcomponent

@endcomponent
