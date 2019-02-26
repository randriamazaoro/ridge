@extends('layouts.app')

@section('title')
	Althmo | Blog
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('blog') }} @endslot 
    @slot('tag_previous') Blog @endslot 
    @slot('tag_current') {{ $category->title }} @endslot 

    {{ $category->title }}

@endcomponent

<!-- BLOG POSTS -->
<section class="section container">
	<!-- TEXT -->
	<h1 class="title has-text-primary">Le plus récent</h1>
	<br />
	<div id="first-post">
		@isset($first_post)
		<div class="tile is-ancestor">
			<div class="tile is-parent is-12">
				<a
					href="{{ url('/blog/post/'.$first_post->slug) }}"
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
								class="tag {{ $first_post->category->color }} is-rounded"
							>
								{{ $first_post->category->title }}
							</span>
							<br />
							<br />
							<p class="title is-4">{{ $first_post->subject }}</p>
							<p class="subtitle is-6">
								{{ $first_post->created_at }}
							</p>
							<p>
								{{ str_limit(strip_tags($first_post->content),
								300) }}
							</p>
							<br />
						</div>
					</div>
				</a>
			</div>
		</div>

		@endif 
	</div>
</section>

<hr/>

<section class="section container"> 
		@forelse($posts->chunk(3) as $chunk)
		<div class="tile is-ancestor" id="posts">
			@foreach($chunk as $post)
			<div class="tile is-parent is-4">
				<a
					href="{{ url('/blog/post/'.$post->slug) }}"
					class="tile is-child box"
				>
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
			@endforeach
		</div>

		@empty 

		Il n'y a pas encore d'article dans cette catégorie 

		@endforelse

		{{ $posts->fragment('posts')->links() }}
	</div>
</section>


@endsection