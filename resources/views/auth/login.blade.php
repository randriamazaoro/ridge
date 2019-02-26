@extends('layouts.min.app')

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
                            <img src="{{ asset('svg/login.svg') }}" />
                        </figure>
                    </div>
                    <br />

                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="field">
                            <div class="control">
                                <label for="password" class="label"
                                    >Mot de passe</label
                                >
                                <input
                                    id="password"
                                    type="password"
                                    class="input is-rounded {{ $errors->has('password') ? ' is-danger' : '' }}"
                                    name="password"
                                    required
                                />

                                @if ($errors->has('password'))
                                <span class="has-text-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <div class="form-check">
                                    <input class="is-checkradio is-circle"
                                    type="checkbox" name="remember"
                                    id="remember" {{ old('remember') ? 'checked'
                                    : '' }}>

                                    <label
                                        class="form-check-label"
                                        for="remember"
                                    >
                                        Rester connecté
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button
                                    type="submit"
                                    class="button is-rounded is-primary is-fullwidth"
                                >
                                    Se connecter
                                </button>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <a
                                    class="button is-rounded is-primary is-outlined is-fullwidth"
                                    href="{{ url('password/reset') }}"
                                >
                                    Mot de passe oublié
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
