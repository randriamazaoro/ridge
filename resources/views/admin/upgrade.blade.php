@extends('layouts.min.app')

@section('title')
	| Mise à niveau du programme
@endsection

@section('content')


@include('partials.navigation-positionned', ['color' => 'is-white'])


@if($affiliate_program->name == "Ultra")

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-256x256">
                    <img src="{{ asset('svg/Ultra.svg') }}">
                </figure>
            </div>
        </div>

        <div class="columns is-centered has-text-centered">
            <div class="column is-8">
                <p class="title">
                    Vous detenez déjà le programme le plus élevé du programme de rémunération.
                </p>

                <br>
                <a class="button is-link is-medium is-rounded" href="{{ url('admin') }}">Retourner au panneau de
                    contrôle</a>
            </div>
        </div>
    </div>
</section>






@else

<section class="container">
    <form method="POST" action="{{ url('admin/settings/upgrade/summary') }}" name="initiation">
        @csrf

        <div class="steps" id="steps">

            <div class="steps-content">
                <div class="step-content is-active">
                    <h1 class="title has-text-primary has-text-centered">
                        Choix de Programme
                    </h1>
                    <div class="columns is-vcentered is-centered">
                        <div class="column is-12">
                            <div class="tile is-ancestor is-perfectly-centered">
                                @foreach($programs as $program)

                                @component('components.program')
                                @slot('program') {{ $program->name }} @endslot
                                @slot('price') {{ $program->price }} (- {{ $affiliate_program->price }}) @endslot
                                @slot('formation') {{ $program->formation }} @endslot
                                @slot('remuneration') {{ $program->remuneration }} @endslot
                                @slot('gains_per_email') {{ $program->gains_per_email}} @endslot
                                @slot('gains_per_sale') {{ $program->gains_per_sale * 100}} @endslot
                                @slot('social') {{ $program->social }} @endslot

                                <input type="radio" class="is-checkradio is-primary is-large" name="program" id="{{ $program->name }}"
                                    value="{{ $program->name }}" onclick="showProgramThemes()" data-validate="require"
                                    {{ $affiliate_program->name == 'Mini' && $program->name == 'Maxi' ? 'checked' : ''}}
                                    {{ $affiliate_program->name == 'Maxi' && $program->name == 'Ultra' ? 'checked' : ''}} />
                                <label for="{{ $program->name }}"> </label>
                                @endcomponent

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-content">
                    <div class="columns is-vcentered is-centered is-multiline">

                        <!-- RIGHT TEXT -->
                        <div class="column is-6">

                            @if($affiliate_program->name == 'Mini')
                            @include('themes.maxi')
                            @endif

                            @include('themes.ultra')

                        </div>
                        <div class="column is-7 has-text-centered">
                            <button class="button is-primary is-rounded">
                                Terminer la mise à niveau
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="step-item is-active"><span class="step-marker">1</span></div>

            <div class="step-item"><span class="step-marker">2</span></div>
            <br />


            <div class="steps-actions is-fixed-bottom navbar">
                <div class="steps-action">
                    <a href="#" data-nav="previous" class="button is-primary is-rounded is-outlined">Précédent</a>
                </div>

                <div class="steps-action">
                    <a href="#" data-nav="next" class="button is-primary is-rounded">Suivant</a>
                </div>
            </div>
        </div>


    </form>

</section>

@endif



@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/bulma-steps.min.js') }}"></script>
<script type="text/javascript">
    bulmaSteps.attach();
</script>
<script type="text/javascript">
    window.onload = function () {
        showProgramThemes();
    }
</script>

@endsection