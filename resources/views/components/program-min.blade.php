<div class="box">
	<div class="columns is-vcentered">
		<div class="column is-3 is-perfectly-centered">
			<figure class="image is-128x128">
				<img src="{{ asset('svg/'.$program.'.svg') }}" />
			</figure>
		</div>

		<div class="column is-2">
			<span class="tag is-success is-rounded is-size-6">{{ $price }} $</span>
			<p class="title is-4">Pack {{ $program }}</p>
		</div>

		<div class="column is-5">
			<ul>
				<li><b>Formation :</b> {{ $formation }}</li>
				<li><b>Rémunération :</b> {{ $remuneration }}.
				<br/>Dont <b class="has-text-warning">{{ $gains_per_email }}$ </b> par email collecté et <b class="has-text-warning">{{ $gains_per_sale }}%</b> de commission par vente</li>
				<li><b>Social :</b> {{ $social }}</li>
				<li><b>Avantages :</b> {{ $advantages }}</li>
			</ul>
		</div>

		<div class="column is-2 is-perfectly-centered">
			<div>
				{{ $slot }}
			</div>
		</div>
	</div>
</div>
<br />