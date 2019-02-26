<div class="theme {{ session()->has('program') && session('program') == 'Maxi' ? '' : 'is-hidden' }}">
	<div class="box">
			<div class="is-perfectly-centered">
				<figure class="image is-128x128">
					<img src="{{ asset('svg/maxi.svg') }}" />
				</figure>
			</div>
			<h1 class="title is-4 has-text-primary has-text-centered">Choix de theme</h1>
			<br>

			<div class="field">
				<label class="label">1er choix</label>
				<div class="control">
					<div class="select is-rounded">
						<select name="theme_maxi_1">
							<option value="" selected disabled hidden>Choisissez</option>
							@foreach($themes as $theme)
							<option value="{{ $theme->id }}"
								>{{ $theme->title }}</option
							>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label">2ème choix</label>
				<div class="control">
					<div class="select is-rounded">
						<select name="theme_maxi_2">
							<option value="" selected disabled hidden>Choisissez</option>
							@foreach($themes as $theme)
							<option value="{{ $theme->id }}"
								>{{ $theme->title }}</option
							>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label">3ème choix</label>
				<div class="control">
					<div class="select is-rounded">
						<select name="theme_maxi_3">
							<option value="" selected disabled hidden>Choisissez</option>
							@foreach($themes as $theme)
							<option value="{{ $theme->id }}"
								>{{ $theme->title }}</option
							>
							@endforeach
						</select>
					</div>
				</div>
			</div>

		</div>
</div>