<section class="container container-margin-top">
    <h3 class="title">A propos</h3>

    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">Mes informations</h4>

            <div class="card card-rotative">
                <div class="front">
                    <div class="cover">
                        <img src="{{ $user->couverture == null ? asset('img/bg5.jpg') : asset('uploads/' . $user->id . '/couverture/' . $user->couverture . '_500x280.png')}}"/>
                    </div>
                    <div class="user">
                        <img class="rounded-circle" src="{{ $user->avatar == null ? ($user->sexe == "homme" ? asset('/img/profil/homme.png') : asset('/img/profil/femme.png')) : asset('uploads/' . $user->id . '/avatar/' . $user->avatar . '_150x150.png') }}"/>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h3 class="name">{{ $user->pseudo }}</h3>
                            <p class="profession">{{ $user->job }}</p>
                            <p class="text-center">
                                {{ $user->description }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="header">
                        <h5 class="motto">{{ $user->email }}</h5>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h4 class="text-center">{{ $user->sexe == "homme" ? 'M.' : 'Mme'  }} {{ $user->firstName }} {{ $user->lastName }}</h4>

                            <div class="list-group">
                                <div class="list-group-item flex-column align-items-sm-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Date de naissance : </h5>
                                    </div>
                                    <p class="mb-1">{{ $user->birthDate }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-sm-start">
                                    <div class="d-flex w-100 justify-content-between">
                                       <h5 class="mb-1">Adresse : </h5>
                                    </div>
                                    <p class="mb-1">
                                        {{ $user->adresse }} {{$user->codePostal}} <br>
                                        {{ $user->state }}
                                    </p>
                                </div>
                            </div>

                            <div class="stats-container">
                                <div class="stats">
                                    <h4>{{ count($abonnements) }}</h4>
                                    <p>Abonné(s)</p>
                                </div>
                                <div class="stats">
                                    <h4>{{ count($abonnes) }}</h4>
                                    <p>Abonnement(s)</p>
                                </div>
                                <div class="stats">
                                    <h4>{{ count($articles) }}</h4>
                                    <p>Article(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">Mes réseaux</h4>

            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    @if($user->lienFacebook)
                        <li class="nav-item">
                            <a href="{{ $user->lienFacebook }}" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Suis moi sur Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>

                    @endif
                    @if($user->lienInstagram)
                        <li class="nav-item">
                            <a href="{{ $user->lienInstagram }}" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Suis moi sur Instagram">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    @endif
                    @if($user->lienTwitter)
                        <li class="nav-item">
                            <a href="{{ $user->lienTwitter }}" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Suis moi sur Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                    @endif
                    @if($user->lienGoogle)
                       <li class="nav-item">
                           <a href="{{ $user->lienGoogle }}" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Suis moi sur Google+">
                               <i class="fa fa-google"></i>
                           </a>
                       </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>