@extends('layouts.min.app')

@section('title')
| Liste des programes et des themes de formation
@endsection

@section('content')

@component('components.header')
@slot('url_previous') {{ url('superadmin') }} @endslot
@slot('tag_previous') Administration @endslot
@slot('tag_current') Liste des programes et des themes de formation @endslot

Liste des programes et des themes de formation

@endcomponent

<section class="section container">

    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                Statistiques
            </h1>
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/ultra.svg') }}" />
                </figure>
            </div>
            <div class="column is-3">
                <p class="heading">Programmes</p>
                <p class="title">{{ $programs->count() }}</p>
            </div>
            <div class="column is-3">
                <p class="heading">Themes</p>
                <p class="title">{{ App\Theme::count() }}</p>
            </div>
        </div>
    </div>
</section>

<hr />

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">
                Programmes
            </h1>
        </div>
    </div>
    <br />
    <div class="tile is-ancestor">
        @foreach($programs as $program)

        @component('components.program')
        @slot('program') {{ $program->name }} @endslot
        @slot('price') {{ $program->price }} @endslot
        @slot('formation') {{ $program->formation }} @endslot
        @slot('remuneration') {{ $program->remuneration }} @endslot
        @slot('gains_per_email') {{ $program->gains_per_email}} @endslot
        @slot('gains_per_sale') {{ $program->gains_per_sale * 100}} @endslot
        @slot('social') {{ $program->social }} @endslot
        @endcomponent

        @endforeach
    </div>
</section>

<hr />

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Formations</h1>
        </div>
        <div class="column is-3 is-offset-4">
            <a onclick="toggleActiveClass('#add-formation')" class="button is-primary is-rounded is-fullwidth">Ajouter
                un nouveau theme</a>
        </div>
    </div>
    <br />
    <div class="box" id="themes">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/list.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($themes as $theme)
                        <tr>
                            <td>{{ $theme->title }}</td>
                            <td>{!! nl2br($theme->description) !!}</td>
                            <td>
                                <a id="id-{{ $theme->id }}" onclick="modifyModal('theme','{{ $theme->id }}')" data-id="{{ $theme->id }}"
                                    data-title="{{ $theme->title }}" data-url="{{ $theme->url }}" data-description="{{ $theme->description }}">
                                    <div class="icon is-large">
                                        <i class="material-icons is-size-3 has-text-primary">edit</i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="{{ $theme->url }}" target="_blank">
                                    <div class="icon is-large">
                                        <i class="material-icons is-size-3 has-text-primary">open_in_new</i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                {{ $themes->fragment('themes')->links() }}
            </div>
        </div>
    </div>

</section>
<hr />

<section class="section container" id="faqs">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">FAQ</h1>
        </div>
        <div class="column is-3 is-offset-4">
            <a onclick="toggleActiveClass('#add-faq')" class="button is-primary is-rounded is-fullwidth">Ajouter une
                nouvelle information</a>
        </div>
    </div>
    <br />
    <h2 class="title is-4">Compte</h2>
    <div class="box" id="account">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/login.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Questions</th>
                            <th>Réponses</th>
                            <th>Categorie</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($faqs_account as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <b class="tag is-rounded is-primary">
                                    {{ $faq->category }}
                                </b>
                            </td>
                            <td>
                                <a id="id-{{ $faq->id }}" onclick="modifyModal('faq','{{ $faq->id }}')" data-id="{{ $faq->id }}"
                                    data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">edit</i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a id="delete-faq-url-{{ $faq->id }}" onclick="deleteModal('faq','{{ $faq->id }}')"
                                    data-url="{{ url('superadmin/programs/delete/faq/'.$faq->id) }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">delete</i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                {{ $faqs_account->fragment('account')->links() }}
            </div>
        </div>
    </div>

    <h2 class="title is-4">Paiement</h2>
    <div class="box" id="payment">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/credit-card.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Questions</th>
                            <th>Réponses</th>
                            <th>Categorie</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($faqs_payment as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <b class="tag is-rounded is-warning">
                                    {{ $faq->category }}
                                </b>
                            </td>
                            <td>
                                <a id="id-{{ $faq->id }}" onclick="modifyModal('faq','{{ $faq->id }}')" data-id="{{ $faq->id }}"
                                    data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">edit</i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a id="delete-faq-url-{{ $faq->id }}" onclick="deleteModal('faq','{{ $faq->id }}')"
                                    data-url="{{ url('superadmin/program/delete/faq/'.$faq->id) }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">delete</i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                {{ $faqs_payment->fragment('payment')->links() }}
            </div>
        </div>
    </div>

    <h2 class="title is-4">Produit</h2>
    <div class="box" id="product">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/ultra.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Questions</th>
                            <th>Réponses</th>
                            <th>Categorie</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($faqs_product as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <b class="tag is-rounded is-danger">
                                    {{ $faq->category }}
                                </b>
                            </td>
                            <td>
                                <a id="id-{{ $faq->id }}" onclick="modifyModal('faq','{{ $faq->id }}')" data-id="{{ $faq->id }}"
                                    data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">edit</i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a id="delete-faq-url-{{ $faq->id }}" onclick="deleteModal('faq','{{ $faq->id }}')"
                                    data-url="{{ url('superadmin/program/delete/faq/'.$faq->id) }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">delete</i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                {{ $faqs_product->fragment('product')->links() }}
            </div>
        </div>
    </div>

    <h2 class="title is-4">CPA & Affiliation</h2>
    <div class="box" id="CPA">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/shopping-basket.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Questions</th>
                            <th>Réponses</th>
                            <th>Categorie</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($faqs_CPA as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <b class="tag is-rounded is-success">
                                    {{ $faq->category }}
                                </b>
                            </td>
                            <td>
                                <a id="id-{{ $faq->id }}" onclick="modifyModal('faq','{{ $faq->id }}')" data-id="{{ $faq->id }}"
                                    data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">edit</i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a id="delete-faq-url-{{ $faq->id }}" onclick="deleteModal('faq','{{ $faq->id }}')"
                                    data-url="{{ url('superadmin/program/delete/faq/'.$faq->id) }}">
                                    <div class="icon">
                                        <i class="material-icons is-size-3 has-text-primary">delete</i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                {{ $faqs_CPA->fragment('CPA')->links() }}
            </div>
        </div>
    </div>

</section>

@include('superadmin.partials.programs')


@endsection