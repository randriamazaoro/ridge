@component('components.modal') 
    @slot('size') 12 @endslot 
    @slot('id') add-article @endslot 
    @slot('status') @endslot

<form action="{{ url('superadmin/blog/add/post') }}" method="POST">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/community.svg') }}" />
        </figure>
    </div>

    <br />

    <div class="field">
        <label for="subject" class="label">Titre</label>

        <div class="control">
            <input
                id="subject"
                type="text"
                class="input is-rounded {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                name="subject"
                required
                autofocus
            />

            @if ($errors->has('subject'))
            <span class="has-text-danger">
                {{ $errors->first('subject') }}
            </span>
            @endif
        </div>
    </div>

    <div class="field">
        <label for="age" class="label">Catégorie</label>
        <div class="control">
            <div class="select is-rounded">
                <select name="category">
                    @foreach(App\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        >{{ $category->title }}</option
                    >
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="content" class="label">Edition</label>
        <div class="control">
            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Gras"
                onclick="textControl('#content','bold')"
            >
                <span class="icon">
                    <i class="material-icons">format_bold</i>
                </span>
            </a>

            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Italique"
                onclick="textControl('#content','italic')"
            >
                <span class="icon">
                    <i class="material-icons">format_italic</i>
                </span>
            </a>

            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Souligné"
                onclick="textControl('#content','underlined')"
            >
                <span class="icon">
                    <i class="material-icons">format_underlined</i>
                </span>
            </a>

            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Guillemets"
                onclick="textControl('#modify-post-content','quotes')"
            >
                <span class="icon">
                    <i class="material-icons">format_quote</i>
                </span>
            </a>

            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Titre"
                onclick="textControl('#content','h1')"
            >
                <span class="icon"> <i class="material-icons">title</i> </span>
            </a>

            <a
                class="button is-primary is-rounded is-outlined tooltip"
                data-tooltip="Insèrer un lien"
                onclick="textControl('#modify-post-content','link')"
            >
                <span class="icon">
                    <i class="material-icons">insert_link</i>
                </span>
            </a>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <textarea
                id="content"
                class="textarea is-rounded {{ $errors->has('content') ? ' is-invalid' : '' }}"
                name="content"
                required
            ></textarea>

            @if ($errors->has('content'))
            <span class="has-text-danger">
                {{ $errors->first('content') }}
            </span>
            @endif
        </div>
    </div>

    <br />
    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Publier
            </button>
        </div>
    </div>
</form>
@endcomponent

<div class="modal" id="modify-post">
    <div class="modal-background" onclick="modifyModal('post')"></div>
    <div class="modal-card bounceIn">
        <div class="columns is-centered">
            <div class="column is-12">
                <div class="box">
                    <form
                        action="{{ url('superadmin/blog/modify/post') }}"
                        method="POST"
                    >
                        @csrf
                        <input type="hidden" name="id" id="modify-post-id" />

                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{ asset('svg/community.svg') }}" />
                            </figure>
                        </div>

                        <br />

                        <div class="field">
                            <label for="modify-post-subject" class="label"
                                >Titre</label
                            >

                            <div class="control">
                                <input
                                    id="modify-post-subject"
                                    type="text"
                                    class="input is-rounded {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                    name="subject"
                                    value=""
                                    required
                                    autofocus
                                />

                                @if ($errors->has('subject'))
                                <span class="has-text-danger">
                                    {{ $errors->first('subject') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="age" class="label">Catégorie</label>
                            <div class="control">
                                <div class="select is-rounded">
                                    <select name="category">
                                        @foreach(App\Category::all() as
                                        $category)
                                        <option value="{{ $category->id }}"
                                            >{{ $category->title }}</option
                                        >
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="content" class="label">Edition</label>
                            <div class="control">
                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Gras"
                                    onclick="textControl('#modify-post-content','bold')"
                                >
                                    <span class="icon">
                                        <i class="material-icons"
                                            >format_bold</i
                                        >
                                    </span>
                                </a>

                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Italique"
                                    onclick="textControl('#modify-post-content','italic')"
                                >
                                    <span class="icon">
                                        <i class="material-icons"
                                            >format_italic</i
                                        >
                                    </span>
                                </a>

                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Souligné"
                                    onclick="textControl('#modify-post-content','underlined')"
                                >
                                    <span class="icon">
                                        <i class="material-icons"
                                            >format_underlined</i
                                        >
                                    </span>
                                </a>

                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Guillemets"
                                    onclick="textControl('#modify-post-content','quotes')"
                                >
                                    <span class="icon">
                                        <i class="material-icons"
                                            >format_quote</i
                                        >
                                    </span>
                                </a>

                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Titre"
                                    onclick="textControl('#modify-post-content','h1')"
                                >
                                    <span class="icon">
                                        <i class="material-icons">title</i>
                                    </span>
                                </a>

                                <a
                                    class="button is-primary is-rounded is-outlined tooltip"
                                    data-tooltip="Insèrer un lien"
                                    onclick="textControl('#modify-post-content','link')"
                                >
                                    <span class="icon">
                                        <i class="material-icons"
                                            >insert_link</i
                                        >
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <textarea
                                    id="modify-post-content"
                                    class="textarea is-rounded {{ $errors->has('content') ? ' is-invalid' : '' }}"
                                    name="content"
                                    required
                                ></textarea>

                                @if ($errors->has('content'))
                                <span class="has-text-danger">
                                    {{ $errors->first('content') }}
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
                                    Modifier l'article
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
        onclick="modifyModal('post')"
    ></button>
</div>

@component('components.modal') 
    @slot('size') 8 @endslot 
    @slot('id') add-category @endslot 
    @slot('status') @endslot

<form action="{{ url('superadmin/blog/add/category') }}" method="POST">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/tags.svg') }}" />
        </figure>
    </div>

    <br />

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
            <span class="has-text-danger"> {{ $errors->first('title') }} </span>
            @endif
        </div>
    </div>

    <br />

    <label for="titre" class="label">Couleurs</label>
    <div class="columns">
        <div class="column is-6">
            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-primary"
                        value="is-primary"
                    />

                    <label for="is-primary">
                        <span class="tag is-primary is-rounded">Bleu</span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-danger"
                        value="is-danger"
                    />

                    <label for="is-danger">
                        <span class="tag is-danger is-rounded">Rouge</span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-success"
                        value="is-success"
                    />

                    <label for="is-success">
                        <span class="tag is-success is-rounded">Vert</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="column is-6">
            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-warning"
                        value="is-warning"
                    />

                    <label for="is-warning">
                        <span class="tag is-warning is-rounded">Jaune</span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-dark"
                        value="is-dark"
                    />

                    <label for="is-dark">
                        <span class="tag is-dark is-rounded">Noir</span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input
                        class="is-checkradio is-circle"
                        type="radio"
                        name="color"
                        id="is-light"
                        value="is-light"
                    />

                    <label for="is-light">
                        <span class="tag is-light is-rounded">Gris</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <br />

    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Publier
            </button>
        </div>
    </div>
</form>
@endcomponent

<div class="modal" id="modify-category">
    <div
        class="modal-background"
        onclick="modifyModal('category')"
    ></div>
    <div class="modal-card bounceIn">
        <div class="columns is-centered">
            <div class="column is-8">
                <div class="box">
                    <form
                        action="{{ url('superadmin/blog/modify/category') }}"
                        method="POST"
                        id="modify-category-form"
                        name="modify-category-form"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="id"
                            id="modify-category-id"
                        />

                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{ asset('svg/tags.svg') }}" />
                            </figure>
                        </div>

                        <br />

                        <div class="field">
                            <label for="modify-category-title" class="label"
                                >Titre</label
                            >

                            <div class="control">
                                <input
                                    id="modify-category-title"
                                    type="text"
                                    class="input is-rounded {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title"
                                    value=""
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

                        <br />

                        <label for="color" class="label">Couleurs</label>
                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-primary"
                                            value="is-primary"
                                        />

                                        <label for="modify-category-is-primary">
                                            <span
                                                class="tag is-primary is-rounded"
                                                >Bleu</span
                                            >
                                        </label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-danger"
                                            value="is-danger"
                                        />

                                        <label for="modify-category-is-danger">
                                            <span
                                                class="tag is-danger is-rounded"
                                                >Rouge</span
                                            >
                                        </label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-success"
                                            value="is-success"
                                        />

                                        <label for="modify-category-is-success">
                                            <span
                                                class="tag is-success is-rounded"
                                                >Vert</span
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-warning"
                                            value="is-warning"
                                        />

                                        <label for="modify-category-is-warning">
                                            <span
                                                class="tag is-warning is-rounded"
                                                >Jaune</span
                                            >
                                        </label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-dark"
                                            value="is-dark"
                                        />

                                        <label for="modify-category-is-dark">
                                            <span class="tag is-dark is-rounded"
                                                >Noir</span
                                            >
                                        </label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input
                                            class="is-checkradio is-circle"
                                            type="radio"
                                            name="color"
                                            id="modify-category-is-light"
                                            value="is-light"
                                        />

                                        <label for="modify-category-is-light">
                                            <span
                                                class="tag is-light is-rounded"
                                                >Gris</span
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="field">
                            <div class="control">
                                <button
                                    class="button is-primary is-rounded is-fullwidth"
                                >
                                    Modifier la categorie
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
        onclick="modifyModal('category')"
    ></button>
</div>