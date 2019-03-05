<div class="field">
	<div class="control">
    <a
        href="{{ $url }}"
        class="{{ $color ?? 'is-primary' }} {{ $type ?? '' }}"
        style="border: 1px solid transparent;font-size: 1rem; position: relative; border-width: 1px; cursor: pointer; padding: 7px 25px;background-color: #00ace8; border-color: transparent; color: #fff; border-radius: 290486px;margin-top:5px;margin-bottom:5px;"
        target="_blank"
        >{{ $slot }}</a
    >
	</div>
</div>