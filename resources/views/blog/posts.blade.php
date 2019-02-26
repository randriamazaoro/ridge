@extends('layouts.app')

@section('title')
	{{$post->subject}}
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('blog') }} @endslot 
    @slot('tag_previous') Blog @endslot 
    @slot('tag_current') {{ $post->subject }} @endslot 

    {{ $post->subject }}

@endcomponent

<section class="section container">
	<div class="columns">
		<div class="column is-8">
			<p class="title is-4">{{ $post->created_at }}</p>

			<div class="content box">
				<span class="tags">
					<span class="tag {{ $post->category->color }} is-rounded">
						{{ $post->category->title }}
					</span>
				</span>

				{!! nl2br($post->content) !!}
			</div>

			<br/>
			<p class="title is-4">Laisser un commentaire</p>
			<div 
				id="comments"
				class="box">
				@auth
				<form
					method="POST"
					action="{{ url("/blog/post/{$post->id}/comment") }}"
				>
					@csrf
					<input
						type="hidden"
						name="post_id"
						value="{{ $post->id }}"
					/>
					<div class="field">
						<div class="control">
							<textarea
								class="textarea is-rounded"
								placeholder="Ecrivez quelque chose ici..."
								name="content"
							></textarea>
						</div>
					</div>

					<div class="field">
						<div class="control">
							<button class="button is-primary is-rounded">
								Commenter
							</button>
						</div>
					</div>
				</form>
				@endauth 

				@guest 
					Vous devez etre connecté pour poster un commentaire 
				@endguest

				<hr />
				@foreach($post->comments as $comment)
				<div class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ asset('svg/businessman.svg') }}" />
						</figure>
					</div>
					<div class="media-content">
						<p>
							<b>{{ $comment->user->name }}</b><br />
							{!! nl2br(e($comment->content)) !!}<br />
							<span class="help">{{ $comment->created_at }}</span>
						</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div class="column is-4">
			<p class="title is-4">Dans la même categorie</p>

			<div class="box">
				<div class="is-perfectly-centered">
					<figure class="image is-128x128">
						<img src="{{ asset('svg/community.svg') }}" />
					</figure>
				</div>
				<br/>
				@forelse($post->category->posts->whereNotIn('id', $post->id)->take(3) as $related_post)

				<div
					class="media"
				>
					<div class="media-content">
						<p>
							<b>
								<a href="{{ url("blog/post/{$related_post->slug}") }}">
									{{ $related_post->subject }}
								</a>
							</b><br />
							{{ $related_post->created_at }}
						</p>
					</div>
				</div>

				@empty

				Il n'y a pas d'autres articles dans la même catégorie

				@endforelse
			</div>
		</div>
	</div>
</section>

@endsection
