<div class="theme">
	<div class="box">
			<div class="is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/ultra.svg') }}" />
				</figure>
			</div>
			<h1 class="title is-4 has-text-primary has-text-centered">Choix de theme</h1>
			<br>

			<div class="columns content">
				@foreach($themes->chunk(7) as $chunk)
				<div class="column is-6">
					@foreach($chunk as $theme)
						<p>
							<span class="icon is-medium">
								<i class="material-icons has-text-primary">check</i>
							</span>
							<label>
								{{ $theme->title }}
							</label>
						</p>
					@endforeach
				</div>
				@endforeach

			</div>
		</div>
</div>