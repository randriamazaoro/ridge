@include('partials.navigation-positionned', ['color' => 'is-dark'])
<section class="hero has-background-abstract is-clipped">
	<div class="hero-body">
		<div class="columns">
			<div class="column is-10 is-offset-1 has-text-left animated fadeInUp delay-1s">
				<br/>
				<p class="tags">
					<a href="{{ $url_previous }}">
						<span class="tag is-white is-rounded"
							>{{ $tag_previous }}</span
						>
					</a>
					<span class="tag is-primary is-rounded"
						>{{ $tag_current }}</span
					>
				</p>
				<h1 class="title">{{ $slot }}</h1>
			</div>
		</div>
	</div>
</section>
<br />