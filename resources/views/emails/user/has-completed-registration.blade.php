@component('mail::message')

<div class="content"> 
    <p><b>Bienvenue chez Ridge</b></p>

    <p>Préparez-vous à gagner une tonne d'argent en monétisant votre trafic grâce à nos offres génératrices de revenus dans tous les secteurs.</p>
    <p>Vous apprendrez tout ce que vous devez savoir sur le marketing d'affiliation.</p>
        
    <p>En attendant, pourquoi ne pas commencer à explorer notre plateforme et à jeter un coup d'œil à nos offres incroyables ?</p>
        
    <p><b>Cliquez sur le boutton ci-dessous pour vérifier votre compte</b>, connectez-vous pour vous mettre dans le bain, et rejoignez également notre groupe d’affiliés Ridge sur Facebook :  Groupe Ridge Officiel.</p>
         
    <p>Nous vous remercions encore de faire partie de la famille Ridge et nous espérons que vous n’aurez rien de moins qu’un parcours fructueux et lucratif avec nous!</p>
         
</div>
<br/>

@component('mail::button', ['url' => $url ])
Verifier mon compte
@endcomponent

@endcomponent
