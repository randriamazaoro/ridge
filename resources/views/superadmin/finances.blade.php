@extends('layouts.min.app')

@section('title')
	 | Finances
@endsection

@section('content')

@component('components.header')
    @slot('url_previous') {{ url('superadmin') }} @endslot 
    @slot('tag_previous') Administration @endslot 
    @slot('tag_current') Finances @endslot 

    Finances

@endcomponent

<section class="section container">
    
    <h1 class="title has-text-primary">Statistiques globales</h1>
    <br />
    <h2 class="title is-4">Statistiques de vente</h2>
    <a href="#sales" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics-1.svg') }}" />
                </figure>
            </div>

            <div class="column is-3">
                <p class="heading">Total des chiffres de ventes</p>
                <p class="title">{{ App\Sale::sum('real_value') }} €</p>
            </div>

            <div class="column is-3">
                <p class="heading">Bénéfices</p>
                <p class="title">{{ App\Sale::sum('benefits') - App\Email::sum('referral_value') }} €</p>
            </div>

            <div class="column is-3">
                <p class="heading">Pertes</p>
                <p class="title">
                    {{ 
                        App\Sale::sum('referral_value') 
                        + App\Email::sum('referral_value') 
                    }} €
                </p>
            </div>
            
        </div>
    </a>

    <br/>

    <h2 class="title is-4">Statistiques de vente</h2>
    <a href="#sales" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics-2.svg') }}" />
                </figure>
            </div>

            <div class="column is-4">
                <p class="heading">A epargner (Approuvées et non payées)</p>
                <p class="title">
                    {{ 
                        App\Sale::where('status','Approuvé')->sum('referral_value')
                        + 
                        App\Email::where('status','!=','Payé')->sum('referral_value') 
                    }} €
                </p>
            </div>

            <div class="column is-3">
                <p class="heading">Déjà Payé</p>
                <p class="title">
                    {{ 
                        App\Sale::where('status','Payé')->sum('referral_value')
                        + 
                        App\Email::where('status','Payé')->sum('referral_value') 
                    }} €
                </p>
            </div>

            
        </div>
    </a>

    <br />

    <h2 class="title is-4">Résumé des activités</h2>
    <a href="#ventes" class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/analytics.svg') }}" />
                </figure>
            </div>
            <div class="column is-3">
                <p class="heading">Ventes effectuées</p>
                <p class="title">{{ App\Sale::count() }}</p>
            </div>
            <div class="column is-3">
                <p class="heading">Emails collectées</p>
                <p class="title">{{ App\Email::count() }}</p>
            </div>
        </div>
    </a>

</section>

<hr/>

<section class="section container">
    <h1 class="title has-text-primary" id="transfer-requests">Demandes de virement</h1>
    <br />
    <h2 class="title is-4">Demandes en attente</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/money-bag.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Affilié</th>
                            <th>Montant désiré</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($pending_transfer_requests as $request)
                        <tr>
                            <td><b>{{ $request->created_at }}</b></td>
                            <td>{{ $request->affiliate_id }}</td>
                            <td>{{ $request->amount }} €</td>
                            <td>
                                <a 
                                    href="{{ url('superadmin/finances/transfer-request/'.$request->affiliate_id) }}"
                                    >
                                    <span class="icon">
                                        <i class="material-icons has-text-primary is-size-3">payment</i>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a 
                                    href="{{ url('superadmin/users/'.$request->to) }}"
                                    target="_blank" 
                                    >
                                    <span class="icon">
                                        <i class="material-icons has-text-primary is-size-3">open_in_new</i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Il n'y a pas encore de demande de virement en cours...</td>
                        </tr>
                        @endforelse
                        
                    </table>
                </div>
                {{ $pending_transfer_requests->fragment('pending-transfer-requests')->links() }}
            </div>
        </div>
    </div>

    <br/>

    <h2 class="title is-4">Demandes accordées</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/money-bag.svg') }}" />
                </figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Affilié</th>
                            <th>Montant désiré</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($paid_transfer_requests as $request)
                        <tr>
                            <td><b>{{ $request->created_at }}</b></td>
                            <td>{{ $request->affiliate_id }}</td>
                            <td>{{ $request->amount }} €</td>
                            <td>
                                <a 
                                    href="{{ url('superadmin/finances/transfer-request/'.$request->affiliate_id) }}"
                                    >
                                    <span class="icon">
                                        <i class="material-icons has-text-primary is-size-3">payment</i>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a 
                                    href="{{ url('superadmin/users/'.$request->to) }}"
                                    target="_blank" 
                                    >
                                    <span class="icon">
                                        <i class="material-icons has-text-primary is-size-3">open_in_new</i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Il n'y a pas encore de demande de virement en cours...</td>
                        </tr>
                        @endforelse
                        
                    </table>
                </div>
                {{ $paid_transfer_requests->fragment('paid-transfer-requests')->links() }}
            </div>
        </div>
    </div>
</section>

<hr>

<section class="section container">
	<h1 class="title has-text-primary" id="affiliates">Statistiques individuelles</h1>
	<br />
	<div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/businessman.svg') }}" />
				</figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th>Id</th>
                            <th>Programme</th>
                            <th>Emails collectées</th>
                            <th>Ventes réalisées</th>
                            <th>Gains en attente</th>
                            <th>Gains approuvés</th>
                            <th>Gains reçus</th>
                            
                            <th></th>
                        </tr>
                        @forelse($affiliates as $affiliate)
                        <tr>
                            <td><b>{{ $affiliate->id }}</b></td>
                            <td>{{ $affiliate->program }}</td>
                            <td>{{ $affiliate->emails->count() }}</td>
                            <td>{{ $affiliate->sales->count() }}</td>
                            <td>
                                <b class="has-text-warning">
                                    {{ 
                                        $affiliate->sales->where('status','En attente')->sum('referral_value') 
                                        + $affiliate->emails->where('status','En attente')->sum('referral_value') }} €
                                </b>
                            </td>
                            <td>
                                <b class="has-text-success">
                                    {{ 
                                        $affiliate->sales->where('status','Approuvé')->sum('referral_value') 
                                        + $affiliate->emails->where('status','Approuvé')->sum('referral_value') }} €
                                </b>
                            </td>

                            <td>
                                <b class="has-text-primary">
                                    {{ 
                                        $affiliate->sales->where('status','Payé')->sum('referral_value') 
                                        + $affiliate->emails->where('status','Payé')->sum('referral_value') }} €
                                </b>
                            </td>
                            
                            <td>
								<a 
									href="{{ url('superadmin/users/'.$affiliate->id) }}"
									target="_blank" 
									>
									<span class="icon">
										<i class="material-icons has-text-primary is-size-3">open_in_new</i>
									</span>
								</a>
							</td>
                        </tr>
                        @empty
                        <tr>
                            <td>Vous n'avez encore référé personne</td>
                        </tr>
                        @endforelse
                        
                    </table>
                </div>
                {{ $affiliates->fragment('affiliates')->links() }}
            </div>
        </div>
    </div>

</section>

<hr/>

<section class="section container">
	<h1 class="title has-text-primary">Statistiques détaillées</h1>
	<br />
	<h2 class="title is-4" id="emails">Références</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/envelope.svg') }}" />
				</figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Réferrant</th>
                            <th>Pertes</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @forelse($emails as $email)
                        <tr>
                            <td><b>{{ $email->created_at }}</b></td>
                            <td>{{ $email->affiliate_id }}</td>
                            <th>
                                <b class="has-text-danger">
                                    {{ $email->referral_value }} €
                                </b>
                            </th>
                            <td>
                                <b class="tag is-rounded {{ $email->tag }}">
                                    {{ $email->status }}
                                </b>
                            </td>
                            <td>
								<a 
									href="{{ url('superadmin/users/'.$email->affiliate_id) }}"
									target="_blank" 
									>
									<span class="icon">
										<i class="material-icons has-text-primary is-size-3">open_in_new</i>
									</span>
								</a>
							</td>
                        </tr>
                        @empty
                        <tr>
                            <td>Vous n'avez encore référé personne</td>
                        </tr>
                        @endforelse
                        
                    </table>
                </div>
                {{ $emails->fragment('emails')->links() }}
            </div>
        </div>
    </div>
    <h2 class="title is-4" id="sales">Ventes</h2>
    <div class="box">
        <div class="columns is-vcentered">
            <div class="column is-3 is-perfectly-centered">
                <figure class="image is-128x128">
                    <img src="{{ asset('svg/shopping-basket.svg') }}" />
				</figure>
            </div>
            <div class="column">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <tr>
                            <th></th>
                            <th>Réferrant</th>
                            <th>Produit</th>
                            <th>Valeur réelle</th>
                            <th>Pourcentage du référant</th>
                            <th>Pertes</th>
                            <th>Bénéfices</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @forelse($sales as $sale)
                        <tr>
                            <td><b>{{ $sale->created_at }}</b></td>
                            <td>{{ $sale->affiliate_id }}</td>
                            <td>Pack {{ $sale->product }}</td>
                            <td>{{ $sale->real_value }} €</td>
                            <td>{{ $sale->affiliate->gains_per_sale * 100 }} %</td>
                            <td>
                                <b class="has-text-danger">
                                {{ $sale->referral_value }} €
                                </b>
                            </td>
                            <td>
                                <b class="has-text-success">
                                    {{ $sale->benefits }} €
                                </b>
                            </td>

                            <td>
                                <b class="tag is-rounded {{ $sale->tag }}">{{ $sale->status }}</b>
                            </td>

                            <td>
								<a 
									href="{{ url('superadmin/users/'.$sale->affiliate_id) }}"
									target="_blank" 
									>
									<span class="icon">
										<i class="material-icons has-text-primary is-size-3">open_in_new</i>
									</span>
								</a>
							</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Vous n'avez pas encore effectué de ventes</td>
                        </tr>
                        @endforelse
                        
                    </table>
                </div>
                {{ $sales->fragment('sales')->links() }}
            </div>
        </div>
    </div>


</section>



@endsection