@extends('layouts.min.app') 

@section('title') | Dashboard @endsection

@section('content') 

@component('components.header')
    @slot('url_previous') {{ url('superadmin') }} @endslot 
    @slot('tag_previous') Administration @endslot 
    @slot('tag_current') Communauté @endslot 

    Communauté

@endcomponent

<section class="section container">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Statistiques</h1>
        </div>
    </div>
    <br />

    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/orders.svg') }}" />
                </figure>
            </div>
            <div class="column is-3">
                <p class="heading">Articles</p>
                <p class="title">{{ App\Post::count() }}</p>
            </div>
            <div class="column is-3">
                <p class="heading">Commentaires</p>
                <p class="title">{{ App\Comment::count() }}</p>
            </div>
        </div>
    </div>
</section>

<hr />

<section class="section container" id="categories">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Catégories</h1>
        </div>
        <div class="column is-3 is-offset-4">
            <a
                onclick="toggleActiveClass('#add-category')"
                class="button is-primary is-rounded is-fullwidth"
                >Créer une nouvelle catégorie</a
            >
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/tags.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Titre</th>
                            <th>Nb de sujets</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($categories as $category)
                        <tr>
                            <td>
                                <span
                                    class="tag {{ $category->color }} is-rounded"
                                >
                                    {{ $category->title }}
                                </span>
                            </td>
                            <td>{{ $category->posts->count() }}</td>
                            <td>
                                <a
                                    id="id-{{ $category->id }}"
                                    data-id="{{ $category->id }}"
                                    data-title="{{ $category->title }}"
                                    data-color="{{ $category->color }}"
                                    onclick="modifyModal('category','{{ $category->id }}')"
                                >
                                    <div class="icon">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >mode_edit</i
                                        >
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a 
                                    id="delete-category-url-{{ $category->id }}"
                                    onclick="deleteModal('category','{{ $category->id }}')" 
                                    data-url="{{ url('superadmin/blog/delete/category/'.$category->id) }}"
                                    >
                                    <div class="icon">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >delete</i
                                        >
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Vous n'avez pas encore publié un article</td>
                        </tr>

                        @endforelse
                    </table>
                </div>
                {{ $categories->fragment('categories')->links() }}
            </div>
        </div>
    </div>
</section>

<hr />

<section class="section container" id="posts">
    <div class="columns">
        <div class="column is-5">
            <h1 class="title has-text-primary">Sujets de conversations</h1>
        </div>
        <div class="column is-3 is-offset-4">
            <a
                onclick="toggleActiveClass('#add-article')"
                class="button is-primary is-rounded is-fullwidth"
                >Ecrire un nouvel article</a
            >
        </div>
    </div>
    <br />
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/community.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Sujet</th>
                            <th>Nb commentaires</th>
                            <th>Categorie</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($posts as $post)
                        <tr>
                            <td>
                                <b>{{ $post->created_at }}</b>
                            </td>
                            <td>{{ $post->subject }}</td>
                            <td>{{ $post->comments->count() }}</td>
                            <td>
                                <b
                                    class="tag {{ $post->category->color }} is-rounded"
                                    >{{ $post->category->title }}</b
                                >
                            </td>
                            <td>
                                <a 
                                    id="id-{{ $post->id }}"
                                    data-subject="{{ $post->subject }}"
                                    data-content="{!! $post->content !!}"
                                    onclick="modifyModal('post','{{ $post->id }}')">
                                    <div class="icon">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >edit</i
                                        >
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a 
                                    id="delete-post-url-{{ $post->id }}"
                                    onclick="deleteModal('post','{{ $post->id }}')" 
                                    data-url="{{ url('superadmin/blog/delete/post/'.$post->id) }}">
                                    <div class="icon">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >delete</i
                                        >
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ url('blog/post/'.$post->slug) }}"
                                    target="_blank"
                                >
                                    <div class="icon">
                                        <i
                                            class="material-icons is-size-3 has-text-primary"
                                            >open_in_new</i
                                        >
                                    </div>
                                </a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td>Vous n'avez pas encore publié un article</td>
                        </tr>

                        @endforelse
                    </table>
                </div>
                {{ $posts->fragment('posts')->links() }}
            </div>
        </div>
    </div>
</section>

@include('superadmin.partials.blog')


@endsection