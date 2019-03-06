<div style="margin-bottom:10px">
    <a
        href="{{ $url }}"
        class="{{ $color ?? 'is-primary' }}"
        style="border: 1px solid transparent;font-size: 1rem; position: relative; border-width: 1px; cursor: pointer; padding: 7px 25px; border-color: #00ace8; border-radius: 290486px;display:block;text-align:center; {{ $type ?? 'background-color: #00ace8; color: #fff' }}"
        target="_blank"
        >{{ $slot }}</a
    >
</div>