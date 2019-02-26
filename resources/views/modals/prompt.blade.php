<div class="modal" id="delete">
    <div class="modal-background" onclick="deleteModal()"></div>
    <div class="modal-card bounceIn">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="box">
                    <div class="is-perfectly-centered">
                        <figure class="image is-128x128">
                            <img src="{{ asset('svg/question.svg') }}" />
                        </figure>
                    </div>
                    <br/>
                    <p
                        class="title is-4 has-text-primary has-text-centered"
                        id="delete-text"
                    ></p>
                    <br />
                    <div class="field">
                        <div class="control">
                            <a
                                class="button is-primary is-rounded is-outlined is-fullwidth"
                                id="delete-url"
                                href=""
                            >
                                Supprimer
                            </a>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <a
                                class="button is-primary is-rounded is-fullwidth"
                                onclick="deleteModal()"
                            >
                                Annuler
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button
        class="modal-close is-large"
        aria-label="close"
        onclick="deleteModal()"
    ></button>
</div>

@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') logout @endslot
    @slot('status') @endslot

<div class="is-perfectly-centered">
    <figure class="image is-128x128">
        <img src="{{ asset('svg/question.svg') }}" />
    </figure>
</div>
<br/>
<p class="title is-4 has-text-primary has-text-centered">
    Souhaitez-vous vraiment vous déconnecter ?
</p>
<br />
<div class="field">
    <div class="control">
        <a
            class="button is-primary is-rounded is-outlined is-fullwidth"
            href="{{ url('logout') }}"
        >
            Se déconnecter
        </a>
    </div>
</div>

<div class="field">
    <div class="control">
        <a
            class="button is-primary is-rounded is-fullwidth"
            onclick="toggleActiveClass('#logout')"
        >
            Annuler
        </a>
    </div>
</div>

@endcomponent