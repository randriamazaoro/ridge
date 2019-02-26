@extends('layouts.min.app')

@section('content')
<section class="hero is-fullheight">
    <div class="hero-head">
        @include('partials.navigation-positionned',['color' => ''])
    </div>
    <div class="hero-body is-block">
        <div class="columns is-vcentered is-centered is-multiline">
            <div class="column is-4 has-text-centered">
                <div class="box bounceIn">
                    <div class="is-perfectly-centered">
                        <figure class="image is-128x128">
                            <img src="{{ asset('svg/handshake.svg') }}" />
                        </figure>
                    </div>
                    <br />

                    <p class="title is-4 has-text-centered has-text-primary">
                        Félicitations !
                    </p>

                    <p class="has-text-justified">
                        Vous avez franchis la première étape pour configurer votre compte. Avant de procèder, nous tenons à verifier l'intégrité des informations de nos futurs collaborateurs.<br>
                        Pour ce faire, nous vous avons envoyer un email de bienvenue qui contient un lien de vérification.
                    </p>

                    <br/>

                    <div class="field">
                        <div class="control">
                            <a 
                                class="button is-primary is-rounded is-outlined is-fullwidth" 
                                href="{{ route('verification.resend') }}">
                                Je n'ai pas reçu l'email
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


<a >
