@component('components.modal')
@slot('size') 8 @endslot
@slot('id') name @endslot
@slot('status') @endslot

<form method="POST" action="{{ url('superadmin/settings/name') }}">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/login.svg') }}">
        </figure>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <label for="name" class="label">Nom d'utilisateur</label>
            <input id="type" type="text" class="input is-rounded {{ $errors->has('name') ? ' is-danger' : '' }}" name="name"
                value="{{ $user->name }}" required autofocus />

            @if ($errors->has('name'))
            <span class="has-text-danger" role="alert">
                {{ $errors->first('name') }}
            </span>
            @endif
        </div>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Valider les modifications
            </button>
        </div>
    </div>
</form>

@endcomponent


@component('components.modal')
@slot('size') 8 @endslot
@slot('id') email @endslot
@slot('status') @endslot

<form method="POST" action="{{ url('superadmin/settings/email') }}">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/login.svg') }}">
        </figure>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <label for="Category" class="label">Adresse e-mail</label>
            <input id="type" type="text" class="input is-rounded {{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                value="{{ $user->email }}" required />

            @if ($errors->has('email'))
            <span class="has-text-danger" role="alert">
                {{ $errors->first('email') }}
            </span>
            @endif
        </div>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Valider les modifications
            </button>
        </div>
    </div>
</form>
@endcomponent


@component('components.modal')
@slot('size') 8 @endslot
@slot('id') paypal @endslot
@slot('status') @endslot

<form method="POST" action="{{ url('superadmin/settings/paypal') }}">
    @csrf

    <div class="is-perfectly-centered">
        <figure class="image is-128x128">
            <img src="{{ asset('svg/credit-card.svg') }}">
        </figure>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <label for="paypal_address" class="label">Adresse Paypal</label>
            <input id="type" type="text" class="input is-rounded {{ $errors->has('paypal_address') ? ' is-danger' : '' }}"
                name="paypal_address" value="{{ $user->paypal_address }}" required />

            @if ($errors->has('paypal_address'))
            <span class="has-text-danger" role="alert">
                {{ $errors->first('paypal_address') }}
            </span>
            @endif
        </div>
    </div>

    <br>

    <div class="field">
        <div class="control">
            <button class="button is-primary is-rounded is-fullwidth">
                Valider les modifications
            </button>
        </div>
    </div>
</form>
@endcomponent
