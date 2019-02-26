<div class="theme {{ session()->has('program') && session('program') == 'Mini' ? '' : 'is-hidden' }}">
	<div class="box">
			<div class="is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/mini.svg') }}" />
				</figure>
			</div>
			<h1 class="title is-4 has-text-primary has-text-centered">Choix de theme</h1>
			<br>

			<div class="columns">
				@foreach($themes->chunk(7) as $chunk)
				<div class="column is-6">
					@foreach($chunk as $theme)
					<div class="field">
						<div class="control">
							<input
								class="is-checkradio"
								type="radio"
								id="{{ $theme->id }}"
								value="{{ $theme->id }}"
								name="theme_mini"
								{{ session()->has('theme_mini') && session('theme_mini') == $theme->title ? 'checked' : '' }}
							/>
							<label for="{{ $theme->id }}">
								{{ $theme->title }}
							</label>
						</div>
					</div>
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
</div>