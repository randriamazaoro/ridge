@extends('layouts.app')

@section('title')
| Crédits
@endsection

@section('content')

@component('components.header')
@slot('url_previous') {{ url('/') }} @endslot
@slot('tag_previous') Pade d'acceuil @endslot
@slot('tag_current') Crédits @endslot

Crédits

@endcomponent

<section class="section">
    <div class="container">

        <h1 class="title has-text-primary">Développement web</h1>
        <div class="box">
            <div class="columns is-vcentered">
                <div class="column is-3 is-perfectly-centered">
                    <figure class="image is-128x128">
                        <img src="{{ asset('svg/gear.svg') }}" />
                    </figure>
                </div>

                <div class="column">
                    <b>Fait par:</b> Randriamazaoro<br />
                    <ul>
                        <li><b>Adresse email:</b> <a href="mailto:{{ config('app.editor_email') }}">{{
                                config('app.editor_email') }}</a></li>
                        <li><b>Numéro de téléphone:</b> {{ config('app.editor_phone') }}</li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</section>

<hr/>

<section class="section">
    <div class="container">
        <h1 class="title has-text-primary">Flat rounded icons</h1>
        <div class="box">
            <div class="columns is-vcentered">
                <div class="column is-3 is-perfectly-centered">
                    <figure class="image is-128x128">
                        <img src="{{ asset('svg/globalization.svg') }}" />
                    </figure>
                </div>

                <div class="column">
                    <b>Made by:</b> <a href="http://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 		    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>

                </div>

            </div>
        </div>




    </div>
</section>

@endsection