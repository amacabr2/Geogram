<section class="card-container" style="margin-top: 2em">
    @if($myAbonnements != null)
        @forelse(array_chunk($myAbonnements->all(), 3) as $row)
            <div class="row">
                @foreach($row as $abonnement)
                    <div class="col-md-4">
                        <div class="card card-rotative">
                            <div class="front">
                                <div class="cover">
                                    <img src="{{ asset('img/bg1.jpg') }}"/>
                                </div>
                                <div class="user">
                                    <img class="rounded-circle" src="{{ asset('img/avatar.jpg') }}"/>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">{{ $abonnement->pseudo }}</h3>
                                        <p class="profession">{{ $abonnement->job }}</p>
                                        <p class="text-center small">{{ $abonnement->description }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="back">
                                <div class="header">
                                    <h5 class="motto">
                                        <a href="{{ route('profil', ['id' => $abonnement->id]) }}" class="link">Voir le profil</a>
                                    </h5>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h4 class="text-center">{{ $abonnement->sexe == "homme" ? 'M.' : 'Mme'  }} {{ $abonnement->firstName }} {{ $abonnement->lastName }}</h4>
                                        <p class="text-center">
                                        <ul>
                                            <li>Date de naissance : {{ $abonnement->birthDate }}</li>
                                            <li>Adresse : {{ $abonnement->adresse }} {{$abonnement->codePostal}} {{ $abonnement->state }}</li>
                                        </ul>
                                        </p>

                                        <div class="stats-container">
                                            <div class="stats">
                                                <h4>{{ count($abonnement->abonnements()) }}</h4>
                                                <p class="small">Abonnement(s)</p>
                                            </div>
                                            <div class="stats">
                                                <h4>{{ count($abonnement->abonnes()) }}</h4>
                                                <p class="small">Abonné(s)</p>
                                            </div>
                                            <div class="stats">
                                                <h4>{{ count($abonnement->posts()) }}</h4>
                                                <p class="small">Article(s)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <p>Vous n'avez pas d'abonnement</p>
        @endforelse

        <div class="row">
            {{ $myAbonnements->render('vendor.pagination.bootstrap-4') }}
        </div>
    @endif
</section>
