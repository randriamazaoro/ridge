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
                <div class="tile is-parent is-4">
                    <div class="tile is-child box">
                        <div class="is-perfectly-centered">
                            <figure class="image is-128x128">
                                <img src="{{
                                asset('svg/'. strtolower($program->name).'.svg')}}" />
                            </figure>
                        </div>
                        <br />

                        <p class="title is-4 has-text-centered">
                            <span class="tag is-success is-rounded is-size-6"
                                >{{ $program->price }} €</span
                            ><br />
                            Pack {{ $program->name }}
                        </p>
                        <ul>
                            <li>
                                <b>Formation :</b> {{ $program->formation }}
                            </li>
                            <br />
                            <li>
                                <b>Rémunération :</b> {{ $program->remuneration
                                }}. <br />Dont
                                <b class="has-text-warning"
                                    >{{ $program->gains_per_email }}€
                                </b>
                                par email collecté et
                                <b class="has-text-warning"
                                    >{{ $program->gains_per_sale * 100 }}%</b
                                >
                                de commission par vente
                            </li>
                            <br />
                            <li><b>Social :</b> {{ $program->social }}</li>
                        </ul>
                    </div>
                </div>
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