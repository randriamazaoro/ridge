<div class="field">
	<div class="control">
    <a
        href="{{ $url }}"
        class="{{ $color ?? 'is-primary' }} {{ $type ?? '' }}"
        style="box-sizing: inherit; text-decoration: none; -webkit-touch-callout: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; -moz-appearance: none; -webkit-appearance: none; align-items: center; border: 1px solid transparent; box-shadow: none; display: inline-flex; font-size: 1rem; height: 2.25em; line-height: 1.5; position: relative; vertical-align: top; border-width: 1px; cursor: pointer; justify-content: center; padding-bottom: calc(0.375em - 1px); padding-top: calc(0.375em - 1px); text-align: center; white-space: nowrap; background-color: #00ace8; border-color: transparent; color: #fff; border-radius: 290486px; padding-left: 1em; padding-right: 1em;"
        target="_blank"
        >{{ $slot }}</a
    >
	</div>
</div>