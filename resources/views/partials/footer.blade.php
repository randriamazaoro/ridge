<hr />
<footer class="section container">
    <small>
        <div class="columns">
            <div class="column is-3 content">
                <p><b>Navigation</b></p>

                <p><a href="{{ url('/') }}"> Page d'acceuil </a></p>

                <p><a href="{{ url('/docs') }}"> Documentation </a></p>

                <p><a href="{{ url('/blog') }}"> Blog </a></p>

                <p><a href="{{ url('contact') }}"> Contact </a></p>
            </div>

            <div class="column is-3 content">
                <p><b>Légal</b></p>

                <p><a href="{{ url('/legal/credit') }}"> Credit </a></p>

                <p><a href="{{ url('/legal/mention-légales') }}"> Mentions légales </a></p>

                <p><a href="{{ url('/legal/CGV') }}"> Conditions générales de ventes </a></p>

                <p><a href="{{ url('/legal/CGV#confidentialité') }}"> Politique de confidentialité </a></p>
            </div>

            <div class="column is-3">
                <p><b>Nous suivre</b></p>
                <br />

                <span class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/facebook.svg") }}" />
                    </figure>
                </span>

                <span class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/twitter.svg") }}" />
                    </figure>
                </span>

                <span class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/instagram.svg") }}" />
                    </figure>
                </span>
            </div>
        </div>

        <div class="has-text-right">
            © {{ date('Y') }} Copyright - Ridge | Website made by <a href="{{ config('app.editor_url') }}"><b>Randriamazaoro</b></a>
        </div>
    </small>
</footer>