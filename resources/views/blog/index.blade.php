@extends('layouts.app')

@section('title')
	Althmo | Blog
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('/') }} @endslot 
    @slot('tag_previous') Pade d'acceuil @endslot 
    @slot('tag_current') Blog @endslot 

    Bienvenue sur le blog

@endcomponent

<!-- BLOG POSTS -->
<section class="section container">
	<!-- TEXT -->
	<h1 class="title has-text-primary">Les plus récents</h1>
	<br />
	<div id="posts">
		@forelse($posts->take(3) as $post) 
		@if($loop->first)
		<div class="tile is-ancestor">
			<div class="tile is-parent is-12">
				<a
					href="{{ url("/blog/post/{$post->slug}") }}"
					class="tile is-child box"
				>
					<div class="columns is-vcentered">
						<div class="column is-3 is-perfectly-centered">
							<figure class="image is-128x128">
								<img src="{{ asset('svg/community.svg') }}" />
							</figure>
						</div>
						<div class="column content">
							<span
								class="tag {{ $post->category->color }} is-rounded"
							>
								{{ $post->category->title }}
							</span>
							<br />
							<br />
							<p class="title is-4">{{ $post->subject }}</p>
							<p class="subtitle is-6">{{ $post->created_at }}</p>
							<p>
								{{ str_limit(strip_tags($post->content), 300) }}
							</p>
							<br />
						</div>
					</div>
				</a>
			</div>
		</div>
			<div class="tile is-ancestor">
		@endif

				<div class="tile is-parent is-4">
					<a
						href="{{ url("/blog/post/{$post->slug}") }}"
						class="tile is-child box"
					>
						<span
							class="tag {{ $post->category->color }} is-rounded"
						>
							{{ $post->category->title }}
						</span>
						<br />
						<br />
						<p class="title is-5">{{ $post->subject }}</p>
						<p class="subtitle is-6">{{ $post->created_at }}</p>
						<p>{{ str_limit(strip_tags($post->content), 300) }}</p>
						<br />
					</a>
				</div>

				@empty 
				Il n'y a pas encore de sujet dans le blog 

				@endforelse
			</div>
	</div>
</section>

<hr />

<section class="section container">
	<h1 class="title has-text-primary">Listé par categories</h1>

	@foreach($categories as $category)
	<br />
	<div class="columns">
		<div class="column is-5">
			<h1 class="title is-4">{{ $category->title }}</h1>
		</div>
		<div class="column is-2 is-offset-5">
			<a 
				href="{{ url("blog/category/{$category->title}") }}" 
				class="button is-primary is-rounded is-fullwidth"
				>Voir plus</a>
		</div>
	</div>

	<div class="tile is-ancestor">
		@forelse($category->posts->take(3) as $post)
		<div class="tile is-parent is-4">
			<a href="{{ url("/blog/post/{$post->slug}") }}" class="tile is-child box">
				<span class="tag {{ $post->category->color }} is-rounded">
					{{ $post->category->title }}
				</span>
				<br />
				<br />
				<p class="title is-5">{{ $post->subject }}</p>
				<p class="subtitle is-6">{{ $post->created_at }}</p>
				<p>{{ str_limit(strip_tags($post->content), 300) }}</p>
				<br />
			</a>
		</div>

		@empty Il n'y a pas encore de sujet dans le blog @endforelse
	</div>

	@endforeach
</section>


@endsection