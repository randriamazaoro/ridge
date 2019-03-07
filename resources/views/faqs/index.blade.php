@extends('layouts.min.app')

@section('title')
	 | Documentation
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('/') }} @endslot 
    @slot('tag_previous') Page d'acceuil @endslot 
    @slot('tag_current') Documentation @endslot 

    Documentation

@endcomponent

<section class="section">
    <div class="container">
            <h1 class="title has-text-primary">Compte</h1>
            <br/>

            @foreach(App\Faq::where('category','Compte')->get()->chunk(3) as $chunk)
			<div class="tile is-ancestor">
			@foreach($chunk as $faq)
			<div class="tile is-parent is-4">
            <div class="tile is-child box">
                <p>
                    <b>{{ $faq->question }}</b><br/>
                    {!! nl2br(e($faq->answer)) !!}
                </p>
            </div>
        	</div>
            @endforeach
        </div>
        @endforeach

    </div>

        
</section>

<hr/>

<section class="section container">
            <h1 class="title has-text-primary">Produit</h1>
            <br/>

            <div class="tile is-ancestor">
                    @foreach(App\Program::all() as $program)
                    @component('components.program')
                    @slot('program') {{ $program->name }} @endslot
                    @slot('price') {{ $program->price }} @endslot
                    @slot('formation') {{ $program->formation }} @endslot
                    @slot('remuneration') {{ $program->remuneration }} @endslot
                    @slot('gains_per_email') {{ $program->gains_per_email }} @endslot
                    @slot('gains_per_sale') {{ $program->gains_per_sale * 100 }} @endslot
                    @slot('social') {{ $program->social }} @endslot
                    @slot('limit') {{ $program->gains_per_email_limit }} @endslot
                    @endcomponent
                    @endforeach
            </div>

            @foreach(App\Faq::where('category','Produit')->get()->chunk(3) as $chunk)
			<div class="tile is-ancestor">
			@foreach($chunk as $faq)
			<div class="tile is-parent is-4">
            <div class="tile is-child box">
                <p>
                    <b>{{ $faq->question }}</b><br/>
                    {!! nl2br(e($faq->answer)) !!}
                </p>
            </div>
        	</div>
            @endforeach
        </div>
        @endforeach

    </div>
 
</section>

<hr/>

<section class="section container">
            <h1 class="title has-text-primary">Paiement</h1>
            <br/>

            @foreach(App\Faq::where('category','Paiement')->get()->chunk(3) as $chunk)
			<div class="tile is-ancestor">
			@foreach($chunk as $faq)
			<div class="tile is-parent is-4">
            <div class="tile is-child box">
                <p>
                    <b>{{ $faq->question }}</b><br/>
                    {!! nl2br(e($faq->answer)) !!}
                </p>
            </div>
        	</div>
            @endforeach
        </div>
        @endforeach

    </div>

        
</section>

<hr/>

<section class="section container">
            <h1 class="title has-text-primary">Programme de rémunération (CPA & Affiliation</h1>
            <br/>

            @foreach(App\Faq::where('category','CPA & Affiliation')->get()->chunk(3) as $chunk)
			<div class="tile is-ancestor">
			@foreach($chunk as $faq)
			<div class="tile is-parent is-4">
            <div class="tile is-child box">
                <p>
                    <b>{{ $faq->question }}</b><br/>
                    {!! nl2br(e($faq->answer)) !!}
                </p>
            </div>
        	</div>
            @endforeach
        </div>
        @endforeach

    </div>

        
</section>



@endsection