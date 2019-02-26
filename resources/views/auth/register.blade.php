@extends('layouts.min.app')

@section('content')

@php
    $ref = 1;
    if(isset($_GET['ref'])){
        $ref = $_GET['ref'];
    }
@endphp




<section class="hero is-fullheight">
    <div class="hero-head">
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
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
                <p class="title">Bonjour,</p>
                <p class="subtitle">
                    Et bienvenue chez
                    <span class="has-text-primary"><b>Ridge</b></span>
                </p>
                <p>
                    <span>
                        Nous sommes très heureux de vous acceuillir dans notre
                        programme. Avant de configurer votre compte, nous
                        aimerions faire votre connaissance.<br />
                        Pour que nous puissions rester en contact, nous aurions
                        besoin de:
                    </span>
                </p>
            </div>

            <div class="column is-4 is-offset-1">
                    <div class="box bounceIn">
                            <div class="is-perfectly-centered">
                                <figure class="image is-128x128">
                                    <img src="{{ asset('svg/handshake.svg') }}" />
                                </figure>
                            </div>
                            <br>
                
                            <form
                                method="POST"
                                action="{{ route('register') }}"
                            >
                                @csrf

                                <input 
                                    type="hidden" 
                                    name="ip_address" 
                                    value="{{ request()->ip() }}" 
                                    >

                                <input
                                    type="hidden"
                                    name="affiliate_id"
                                    value="{{ $ref }}"
                                />

                                <div class="field">
                                    <label for="name" class="label"
                                        >Nom d'utilisateur</label
                                    >

                                    <div class="control">
                                        <input
                                            id="name"
                                            type="text"
                                            class="input is-rounded {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name"
                                            value="{{ old('name') }}"
                                            required
                                            autofocus
                                        />

                                        @if ($errors->has('name'))
                                        <span class="has-text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

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
                                        >{{ __('Confirmer votre mot de passe')
                                        }}</label
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

                                <br>

                                <div class="field">
                                    <div class="control">
                                        <button
                                            type="submit"
                                            class="button is-primary is-rounded is-fullwidth"
                                        >
                                            S'inscrire
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
