<div class="field">
	<div class="control">
    <a
        href="{{ $url }}"
        class="button is-rounded {{ $color ?? 'is-primary' }} {{ $type ?? '' }}"
        target="_blank"
        >{{ $slot }}</a
    >
	</div>
</div>