<div class="modal {{ $status }}" id="{{$id}}">
	<div 
		class="modal-background"
		onclick="toggleActiveClass('#{{$id}}')"
	></div>
	<div class="modal-card animated bounceIn">
		<div class="columns is-centered">
        	<div class="column is-{{ $size }}">
        		<div class="box">
					{{ $slot }}
				</div>
			</div>
		</div>
	</div>
	<button 
		class="modal-close is-large" 
		aria-label="close"
		onclick="toggleActiveClass('#{{$id}}')" 
	></button>
</div>