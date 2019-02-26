@extends('layouts.min.app')

@section('title')
    | Mot de passe oublié
@endsection

@section('content')

<section class="hero is-fullheight">
    <div class="hero-head">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a href="{{ route('home') }}" class="navbar-item">
                        <img src="{{ asset('svg/logo.svg') }}" width="75px" />
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body is-block">
        <div class="columns is-vcentered is-centered is-multiline">
            <div class="column is-4 has-text-centered">
                <div class="box bounceIn">
                    <div class="is-perfectly-centered">
                        <figure class="image is-128x128">
                            <img src="{{ asset('svg/security.svg') }}" />
                        </figure>
                    </div>
                    <br />

                    <p class="title is-4 has-text-primary">Vous avez oublié votre mot de passe ?</p>
                    <p>
                    Nous pouvons vous envoyer un lien pour le réinitialiser en insèrant votre adresse e-mail ci-dessous
                    </p> 
                    <br/>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field">
                            <div class="control">
                                <label for="email" class="label"
                                    >Adresse e-mail</label
                                >
                                <input
                                    id="email"
                                    type="email"
                                    class="input is-rounded {{ $errors->has('email') ? ' is-danger' : '' }}"
                                    name="email"
                                    value=""
                                    required
                                    autofocus
                                />

                                @if ($errors->has('email'))
                                <span class="has-text-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <br/>

                        <div class="field">
                            <div class="control">
                                <button
                                    type="submit"
                                    class="button is-rounded is-primary is-fullwidth"
                                >
                                    Envoyer le lien
                                </button>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <a
                                    href="{{ url('login') }}"
                                    class="button is-rounded is-primary is-outlined is-fullwidth"
                                >
                                    Non, je m'en souviens !
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection