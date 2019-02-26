@extends('layouts.min.app')

@section('title')
    | Réinitialisation du mot de passe
@endsection

@section('content')

<section class="hero is-fullheight">
    <div class="hero-head">
        <nav
            class="navbar is-fixed-top"
            role="navigation"
            aria-label="main navigation"
        >
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
        <div class="columns is-vcentered is-centered">
            <div class="column is-4">
                <div class="box bounceIn">
                    <div class="is-perfectly-centered">
                        <figure class="image is-128x128">
                            <img src="{{ asset('svg/security.svg') }}" />
                        </figure>
                    </div>
                    <br />
                    <p class="title is-4 has-text-primary has-text-centered">
                        Réinitialisation du mot de passe
                    </p>
                    <br/>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $token }}"
                        />

                        <div class="field">
                            <label for="email" class="label"
                                >{{ __('Adresse E-mail') }}</label
                            >

                            <div class="control">
                                <input
                                    id="email"
                                    type="email"
                                    class="input is-rounded {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                />

                                @if ($errors->has('email'))
                                <span class="has-text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label"
                                >{{ __('Mot de passe') }}</label
                            >

                            <div class="control">
                                <input
                                    id="password"
                                    type="password"
                                    class="input is-rounded {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password"
                                    required
                                />

                                @if ($errors->has('password'))
                                <span class="has-text-danger">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label"
                                >{{ __('Confirmer votre mot de passe') }}</label
                            >

                            <div class="control">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="input is-rounded"
                                    name="password_confirmation"
                                    required
                                />
                            </div>
                        </div>

                        <br />

                        <div class="field">
                            <div class="control">
                                <button
                                    type="submit"
                                    class="button is-primary is-rounded is-fullwidth"
                                >
                                    Réinitialiser mon mot de passe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

