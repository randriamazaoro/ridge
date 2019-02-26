@if(session('completed-initiation'))
@component('components.modal')
	@slot('size') 8 @endslot
	@slot('id') completed-initiation @endslot
	@slot('status') is-active @endslot

	<div class="is-perfectly-centered">
		<figure class="image is-128x128">
			<img src="{{ asset('svg/rocket.svg') }}">
		</figure>
	</div>

	<br/>
	<div class="has-text-centered">

		<p class="title has-text-primary">Felicitations !!!</p>
		<p class="subtitle">
			Vous avez terminé l'étape d'initiation.<br/>
			Vous pouvez dersormais:
		</p>
		<p class="has-text-left">
            <div class="media">
                <div class="media-left">
                    <span class="icon">
                        <i class="material-icons has-text-primary">check</i>
                    </span>
                </div>
                <div class="media-content content">
                    Participer à notre programme d'affiliation
                </div>
            </div>

            <div class="media">
                <div class="media-left">
                    <span class="icon">
                        <i class="material-icons has-text-primary">check</i>
                    </span>
                </div>
                <div class="media-content content">
                    Réferrer des nouveaux utilisateurs
                </div>
            </div>

            <div class="media">
                <div class="media-left">
                    <span class="icon">
                        <i class="material-icons has-text-primary">check</i>
                    </span>
                </div>
                <div class="media-content content">
                    Télécharger vos formations sur les themes que vous avez choisi
                </div>
            </div>
			
		</p>

		<br/>
        <br/>
		<button 
			class="button is-primary is-rounded is-fullwidth"
			onclick="toggleActiveClass('#completed-initiation')"
			>Voir le panneau de contrôle</button>
	</div>


@endcomponent
@endif



@if(session('completed-register'))
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') completed-register @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/handshake.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title has-text-primary">Felicitations !!!</p>
        <p class="subtitle">
            Bienvenue chez Ridge
        </p>
        <p>
            Pour commencer à gagner de l'argent, il y a plusieurs étapes à suivre dont la plus importante est:<br> <b>acheter un programme de rémunération</b>. Poursuivons !
        </p>

        <br/>
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#completed-register')"
            >Commencer l'initiation</button>
    </div>


@endcomponent
@endif

@if ($errors->any())
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') errors @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/cross.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">Il y a eu des erreurs dans la saisie de vos données</p>
        <p class="subtitle">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </p>

        <br/>
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#errors')"
            >Valider</button>
    </div>


@endcomponent
@endif

@if(session('paypal') == "danger")
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') paypal-error @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/cross.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">
            {{ session('message') }}
        </p>

        <br/>
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#paypal-error')"
            >Valider</button>
    </div>


@endcomponent
@endif

@if(session('code') == "existing_user")
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') existing-user @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/cross.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">
            {{ session('message') }}
        </p>

        <br/>
        <div class="field">
            <div class="control">
                <a 
                    href="{{ url('login') }}"
                    class="button is-primary is-rounded is-fullwidth">
                    Se connecter
                </a>
            </div>
        </div>
    </div>


@endcomponent
@endif

@if(session('status'))
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') forgotten-password @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/envelope.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">
            {{ session('status') }}
        </p>

        <br/>
        <div class="field">
            <div class="control">
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#forgotten-password')"
            >Valider</button>
        </div>
    </div>
    </div>


@endcomponent
@endif

@if (session('resent'))
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') resent-verification @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/envelope.svg') }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">
            Un email de bienvenue avec un lien de vérification vous a été envoyé !
        </p>

        <br/>
        <div class="field">
            <div class="control">
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#resent-verification')"
            >Valider</button>
        </div>
    </div>
    </div>


@endcomponent
@endif

@if(session('code'))
@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') {{ session('code') }} @endslot
    @slot('status') is-active @endslot

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset("svg/". session('image') .".svg") }}">
        </figure>
    </div>

    <br/>
    <div class="has-text-centered">

        <p class="title is-4 has-text-primary">
            {{ session('title') }}
        </p>
        <p class="subtitle">{{ session('subtitle') }}</p>

        <br/>
        <div class="field">
            <div class="control">
        <button 
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#{{ session('code') }}')"
            >Valider</button>
        </div>
    </div>
    </div>


@endcomponent
@endif