@component('components.modal')
	@slot('size') 8 @endslot
	@slot('id') transfer_requests @endslot
	@slot('status') @endslot

	<div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/money-bag.svg') }}">
        </figure>
    </div>

    <br>

    @for($i = 1; $i <= $transfer_requests->count(); $i++)
    
    <p id="user-{{ $i }}">
    </p>
    @endfor



@endcomponent