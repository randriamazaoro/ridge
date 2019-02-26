@extends('layouts.min.app')

@section('title')
| Dashboard
@endsection

@section('content')

@include('partials.navigation-positionned', ['color' => 'is-white'])
<section class="container">

    <form method="POST" action="{{ url('admin/initiation/summary') }}" name="initiation">
        @csrf

        <div class="steps" id="steps">

            <div class="steps-content">
                <div class="step-content is-active">
                    <div class="columns is-vcentered is-centered">

                        <div class="column is-4">
                            <div class="box">
                                <div class="is-perfectly-centered">
                                    <figure class="image is-128x128">
                                        <img src="{{ asset('svg/curriculum.svg') }}" />
                                    </figure>
                                </div>
                                <h1 class="title is-4 has-text-primary has-text-centered">Données personnelles</h1>
                                <br />

                                <div class="field">
                                    <label for="first_name" class="label">{{ __('Prenom') }}</label>

                                    <div class="control">
                                        <input id="first_name" type="text" class="input is-rounded {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                            name="first_name" value="{{ session()->has('first_name') ? session('first_name') : old('first_name') }}"
                                            data-validate="require" required autofocus />

                                        @if ($errors->has('first_name'))
                                        <span class="has-text-danger">
                                            {{ $errors->first('first_name')
                                            }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="last_name" class="label">{{ __('Nom') }}</label>

                                    <div class="control">
                                        <input id="last_name" type="text" class="input is-rounded {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                            name="last_name" value="{{ session()->has('last_name') ? session('last_name') : old('last_name') }}"
                                            data-validate="require" required />

                                        @if ($errors->has('last_name'))
                                        <span class="has-text-danger">
                                            {{ $errors->first('last_name')
                                            }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="age" class="label">Age</label>
                                    <div class="control">
                                        <div class="select is-rounded">
                                            <select name="age">
                                                @for($age = 18; $age <= 100; $age++) <option value="{{ $age }}">{{ $age
                                                    }}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>

                                    @if ($errors->has('age'))
                                    <span class="has-text-danger">
                                        {{ $errors->first('age') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="gender" class="label">Sexe</label>
                                    <div class="control">
                                        <input class="is-checkradio is-circle" type="radio" id="homme" value="homme"
                                            name="gender"
                                            {{ session()->has('gender') && session('gender') == 'homme' ? 'checked' : 'checked' }} />
                                        <label for="homme"> Homme </label>
                                        <input class="is-checkradio is-circle" type="radio" id="femme" value="femme"
                                            name="gender"
                                            {{ session()->has('gender') && session('gender') == 'femme' ? 'checked' : '' }} />
                                        <label for="femme"> Femme </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="step-content is-active">
                    <div class="columns is-vcentered is-centered">

                        <div class="column is-4">
                            <div class="box">

                                <div class="is-perfectly-centered">
                                    <figure class="image is-128x128">
                                        <img src="{{ asset('svg/contact.svg') }}" />
                                    </figure>
                                </div>
                                <h1 class="title is-4 has-text-primary has-text-centered">Données de contact</h1>
                                <br>

                                <div class="field">
                                    <label for="email_contact" class="label">Adresse E-mail de contact (Optionnel)</label>

                                    <div class="control">
                                        <input id="email_contact" type="text" class="input is-rounded {{ $errors->has('email_contact') ? ' is-invalid' : '' }}"
                                            name="email_contact" value="{{ session()->has('email_contact') ? session('email_contact') : old('email_contact') }}" />

                                        @if ($errors->has('email_contact'))
                                        <span class="has-text-danger">
                                            {{ $errors->first('email_contact')
                                            }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="phone" class="label">Numéro de contact (Optionnel)</label>

                                    <div class="control">
                                        <input id="phone" type="text" class="input is-rounded {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ session()->has('phone') ? session('phone') : old('phone') }}" />

                                        @if ($errors->has('phone'))
                                        <span class="has-text-danger">
                                            {{ $errors->first('phone')
                                            }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="country" class="label">Pays</label>

                                    <div class="control">
                                        <div class="select is-rounded">
                                            <select name="country">

                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The
                                                    Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                    Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea,
                                                    Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's
                                                    Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia,
                                                    The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated
                                                    States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                    Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South
                                                    Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic
                                                    of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States
                                                    Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="city" class="label">Ville</label>

                                        <div class="control">
                                            <input id="city" type="text" class="input is-rounded {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                name="city" value="{{ session()->has('city') ? session('city') : old('city') }}"
                                                data-validate="require" required />

                                            @if ($errors->has('city'))
                                            <span class="has-text-danger">
                                                {{ $errors->first('city') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="step-content">
                        <br />
                        <h1 class="title has-text-primary has-text-centered">
                            Choix de Programme
                        </h1>
                        <div class="columns is-vcentered is-centered">
                            <div class="column is-12">
                                <div class="tile is-ancestor">
                                    @foreach($programs as $program)

                                    @component('components.program')
                                    @slot('program') {{ $program->name }} @endslot
                                    @slot('price') {{ $program->price }} @endslot
                                    @slot('formation') {{ $program->formation }} @endslot
                                    @slot('remuneration') {{ $program->remuneration }} @endslot
                                    @slot('gains_per_email') {{ $program->gains_per_email }} @endslot
                                    @slot('gains_per_sale') {{ $program->gains_per_sale * 100}} @endslot
                                    @slot('social') {{ $program->social }} @endslot
                                    @slot('advantages') {{ $program->advantages }} @endslot

                                    <input type="radio" class="is-checkradio is-primary is-large" name="program" id="{{ $program->name }}"
                                        value="{{ $program->name }}" onclick="showProgramThemes()" data-validate="require"
                                        {{ session()->has('program') && session('program') == $program->name ? 'checked' : ''}}
                                        {{ $program->name == 'Mini' ? 'checked' : '' }} />
                                    <label for="{{ $program->name }}"> </label>
                                    @endcomponent

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-content">
                        <div class="columns is-vcentered is-centered">

                            <!-- RIGHT TEXT -->
                            <div class="column is-5">
                                @include('themes.Mini')

                                @include('themes.Maxi')

                                @include('themes.Ultra')

                            </div>
                        </div>
                    </div>

                    <div class="step-content">
                        <div class="columns is-centered">
                            <div class="column is-4">
                                <div class="box">
                                    <div class="is-perfectly-centered">
                                        <figure class="image is-128x128">
                                            <img src="{{ asset('svg/credit-card.svg') }}">
                                        </figure>
                                    </div>
                                    <h1 class="title is-4 has-text-primary has-text-centered">Moyen de paiement</h1>
                                    <br>

                                    <div class="field">
                                        <div class="control">
                                            <label for="paypal_address" class="label">Adresse Paypal</label>
                                            <input id="type" type="text" class="input is-rounded {{ $errors->has('paypal_address') ? ' is-danger' : '' }}"
                                                name="paypal_address" value="{{ session()->has('paypal_address') ? session('paypal_address') : old('paypal_address') }}"
                                                required />

                                            @if ($errors->has('paypal_address'))
                                            <span class="has-text-danger" role="alert">
                                                {{ $errors->first('paypal_address') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary is-rounded is-fullwidth">
                                            Terminer l'initiation
                                        </button>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <a href="{{ url('contact') }}" class="button is-primary is-rounded is-outlined is-fullwidth">
                                            Je n'ai pas de compte PayPal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-item is-active"><span class="step-marker">1</span></div>

                <div class="step-item">
                    <div class="step-marker">2</div>
                </div>

                <div class="step-item">
                    <div class="step-marker">3</div>
                </div>

                <div class="step-item">
                    <div class="step-marker">4</div>
                </div>

                <div class="step-item">
                    <div class="step-marker">5</div>
                </div>

                <br />

                <div class="steps-actions is-fixed-bottom navbar">
                    <div class="steps-action">
                        <a href="#" data-nav="previous" class="button is-primary is-rounded is-outlined">Précédent</a>
                    </div>

                    <div class="steps-action">
                        <a href="#" data-nav="next" class="button is-primary is-rounded">Suivant</a>
                    </div>
                </div>


            </div>

    </form>



</section>



@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/bulma-steps.js') }}"></script>
<script type="text/javascript">
    bulmaSteps.attach();
</script>
<script type="text/javascript">
    window.onload = function () {
        showProgramThemes();
    }
</script>

@endsection