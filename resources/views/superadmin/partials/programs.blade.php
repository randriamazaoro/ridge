@component('components.modal')
	@slot('size') 8 @endslot
	@slot('id') add-formation @endslot
	@slot('status') @endslot

<form action="{{ url('superadmin/programs/add/theme') }}" method="POST">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/list.svg') }}">
        </figure>
    </div>

    <br>

    <div class="field">
        <label for="title" class="label">Titre</label>

        <div class="control">
            <input
                id="title"
                type="text"
                class="input is-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}"
                name="title"
                required
                autofocus
            />

            @if ($errors->has('title'))
            <span class="has-text-danger">
                {{ $errors->first('title') }}
            </span>
            @endif
        </div>
    </div>

    <div class="field">
        <label for="url" class="label">Lien</label>

        <div class="control">
            <input
                id="url"
                type="url"
                class="input is-rounded {{ $errors->has('url') ? ' is-invalid' : '' }}"
                name="url"
                required
            />

            @if ($errors->has('url'))
            <span class="has-text-danger">
                {{ $errors->first('url') }}
            </span>
            @endif
        </div>
    </div>

    <div class="field">
        <label for="description" class="label">Description</label>

        <div class="control">
            <textarea
                id="description"
                class="textarea is-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}"
                name="description"
                required
            ></textarea>

            @if ($errors->has('description'))
            <span class="has-text-danger">
                {{ $errors->first('description') }}
            </span>
            @endif
        </div>
    </div>

    <br/>
    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Enregistrer le nouveau theme
            </button>
        </div>
    </div>
</form>
@endcomponent


<div class="modal" id="modify-theme">
    <div class="modal-background" onclick="modifyModal('theme')"></div>
    <div class="modal-card bounceIn">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="box">
                    <form
                        action="{{ url('superadmin/programs/modify/theme') }}"
                        method="POST"
                    >
                        @csrf

                        <input type="hidden" name="id" id="modify-theme-id">

                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{ asset('svg/list.svg') }}" />
                            </figure>
                        </div>

                        <br />

                        <div class="field">
                            <label for="modify-theme-title" class="label">Titre</label>

                            <div class="control">
                                <input
                                    id="modify-theme-title"
                                    type="text"
                                    class="input is-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title"
                                    required
                                    autofocus
                                />

                                @if ($errors->has('title'))
                                <span class="has-text-danger">
                                    {{ $errors->first('title') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="modify-theme-url" class="label">Lien</label>

                            <div class="control">
                                <input
                                    id="modify-theme-url"
                                    type="url"
                                    class="input is-rounded {{ $errors->has('url') ? ' is-invalid' : '' }}"
                                    name="url"
                                    required
                                />

                                @if ($errors->has('url'))
                                <span class="has-text-danger">
                                    {{ $errors->first('url') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="modify-theme-description" class="label"
                                >Description</label
                            >

                            <div class="control">
                                <textarea
                                    id="modify-theme-description"
                                    class="textarea is-rounded {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description"
                                    required
                                ></textarea
                                >

                                @if ($errors->has('description'))
                                <span class="has-text-danger">
                                    {{ $errors->first('description') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <br />
                        <div class="field">
                            <div class="control">
                                <button
                                    class="button is-primary is-rounded is-fullwidth"
                                >
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button
        class="modal-close is-large"
        aria-label="close"
        onclick="modifyModal('theme')"
    ></button>
</div>

@component('components.modal')
    @slot('size') 8 @endslot
    @slot('id') add-faq @endslot
    @slot('status') @endslot

<form action="{{ url('superadmin/programs/add/faq') }}" method="POST">
    @csrf

    <input type="hidden" name="id" id="modify-faq-id" />

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/brainstorming.svg') }}" />
        </figure>
    </div>

    <br />

    <div class="field">
        <label for="modify-faq-question" class="label">Question</label>

        <div class="control">
            <input
                id="modify-faq-question"
                type="text"
                class="input is-rounded {{ $errors->has('url') ? ' is-invalid' : '' }}"
                name="question"
                required
            />

            @if ($errors->has('question'))
            <span class="has-text-danger">
                {{ $errors->first('question') }}
            </span>
            @endif
        </div>
    </div>

    <div class="field">
        <label for="age" class="label">Catégorie</label>
        <div class="control">
            <div class="select is-rounded">
                <select name="category">
                    <option value="Compte"
                        >Compte</option
                    >
                    <option value="Paiement"
                        >Paiement</option
                    >
                    <option value="Produit"
                        >Produit</option
                    >
                    <option value="CPA & Affiliation"
                        >CPA & Affiliation</option
                    >
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="modify-faq-answer" class="label">Réponse</label>

        <div class="control">
            <textarea
                id="modify-faq-answer"
                class="textarea is-rounded {{ $errors->has('answer') ? ' is-invalid' : '' }}"
                name="answer"
                required
            ></textarea>

            @if ($errors->has('answer'))
            <span class="has-text-danger">
                {{ $errors->first('answer') }}
            </span>
            @endif
        </div>
    </div>

    <br />
    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Enregistrer l'informations
            </button>
        </div>
    </div>
</form>
@endcomponent


<div class="modal" id="modify-faq">
    <div class="modal-background" onclick="modifyModal('faq')"></div>
    <div class="modal-card bounceIn">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="box">
                    <form
                        action="{{ url('superadmin/programs/modify/faq') }}"
                        method="POST"
                    >
                        @csrf

                        <input type="hidden" name="id" id="modify-faq-id" />

                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img
                                    src="{{ asset('svg/brainstorming.svg') }}"
                                />
                            </figure>
                        </div>

                        <br />

                        <div class="field">
                            <label for="modify-faq-question" class="label"
                                >Question</label
                            >

                            <div class="control">
                                <input
                                    id="modify-faq-question"
                                    type="text"
                                    class="input is-rounded {{ $errors->has('url') ? ' is-invalid' : '' }}"
                                    name="question"
                                    required
                                />

                                @if ($errors->has('question'))
                                <span class="has-text-danger">
                                    {{ $errors->first('question') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="age" class="label">Catégorie</label>
                            <div class="control">
                                <div class="select is-rounded">
                                    <select name="category">
                                        <option value="Compte">Compte</option>
                                        <option value="Paiement"
                                            >Paiement</option
                                        >
                                        <option value="Produit">Produit</option>
                                        <option value="CPA & Affiliation"
                                            >CPA & Affiliation</option
                                        >
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="modify-faq-answer" class="label"
                                >Réponse</label
                            >

                            <div class="control">
                                <textarea
                                    id="modify-faq-answer"
                                    class="textarea is-rounded {{ $errors->has('answer') ? ' is-invalid' : '' }}"
                                    name="answer"
                                    required
                                ></textarea>

                                @if ($errors->has('answer'))
                                <span class="has-text-danger">
                                    {{ $errors->first('answer') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <br />
                        <div class="field">
                            <div class="control">
                                <button
                                    class="button is-primary is-rounded is-fullwidth"
                                >
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button
        class="modal-close is-large"
        aria-label="close"
        onclick="modifyModal('faq')"
    ></button>
</div>