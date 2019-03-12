@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <br/>
            <small>Ce message vous est fourni pour vous informer des changements ou des évènements sur votre compte. Pour toutes demandes, merci de ne pas repondre à ce message et de nous ecrire à <b><a href="mailto:support@ridge.work">support@ridge.work</a></b>.<br/>
            <b>{{ config('app.name') }}</b> - © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</small>
        @endcomponent
    @endslot
@endcomponent
