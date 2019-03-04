<hr />
<br/>
<footer class="container">
    <small>
        <div class="columns">
            <div class="column is-4">
                <img src="{{ asset('svg/logo.svg') }}" style="height:50px;" />
            </div>
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

            <div class="column is-2 content">
                <p><b>Mon espace</b></p>

                <p><a href="{{ url('/login') }}"> Se connecter </a></p>

                <p><a href="{{ url('/register') }}"> Créer un compte </a></p>


            </div>
        </div>

        <div class="columns is-vcentered">
            <span class="column has-text-left">© {{ date('Y') }} Copyright - Ridge | Website made by <a href="{{ config('app.editor_url') }}"><b>Randriamazaoro</b></a></span>
            <span class="column has-text-right">
                <a href="https://www.facebook.com/Ridgeofficiel" target="_blank" class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/facebook.svg") }}" />
                    </figure>
                </a>
                <a href="https://twitter.com/OfficielRidge" target="_blank" class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/twitter.svg") }}" />
                    </figure>
                </a>
                <a href="https://www.linkedin.com/in/ridge-officiel-441619181/" target="_blank" class="icon is-large">
                    <figure class="image is-32x32">
                        <img src="{{ asset("svg/social/linkedin.svg") }}" />
                    </figure>
                </a>
            </a>
        </div>
    </small>
</footer>