<div class="tile is-parent is-4">
    <div class="tile is-child box">
        <div class="is-perfectly-centered">
            <figure class="image is-128x128">
                <img src="{{ asset("svg/{$program}.svg")}}" />
            </figure>
        </div>
        <br />

        <p class="title is-4 has-text-centered">
            <span class="tag is-success is-rounded is-size-6"
                >{{ $price }} €</span
            ><br />
            Pack {{ $program }}
        </p>
        <ul>
            <li><b>Formation :</b> {{ $formation }}</li>
            <br />
            <li>
                <b>Rémunération :</b> {{ $remuneration }}. <br />Dont
                <b class="has-text-warning">{{ $gains_per_email }}€ </b> par
                email collecté et
                <b class="has-text-warning">{{ $gains_per_sale }}%</b> de
                commission par vente
            </li>
            <br />
            <li><b>Social :</b> {{ $social }}</li>
            <br />
            <li><b>Avantages :</b> {{ $advantages }}</li>
        </ul>
        <br />
        <div class="is-perfectly-centered"><div>{{ $slot }}</div></div>
    </div>
</div>