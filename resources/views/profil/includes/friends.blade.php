<section class="container" style="margin-top: 2em">
    @if($friends != null)
        @forelse(array_chunk($friends->all(), 3) as $row)
            <div class="row">
                @foreach($row as $friend)
                    <div class="col-md-4">
                        <a href="{{ route('profil', ['id' => $friend->id]) }}">
                            <div class="card">
                                <div class="cover">
                                    <img src="{{ $friend->couverture == null ? asset('img/bg5.jpg') : asset('uploads/' . $friend->id . '/couverture/' . $friend->couverture . '_500x280.png')}}"/>
                                </div>
                                <div class="user">
                                    <img class="rounded-circle" src="{{ $friend->avatar == null ? ($friend->sexe == "homme" ? asset('/img/profil/homme.png') : asset('/img/profil/femme.png')) : asset('uploads/' . $friend->id . '/avatar/' . $friend->avatar . '_150x150.png') }}"/>
                                </div>
                                <div class="content">
                                    <div class="main">
                                        <h3 class="name">{{ $friend->pseudo }}</h3>
                                        <p class="profession">{{ $friend->job }}</p>
                                        <p class="text-center small">{{ $friend->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="row">
                <p>Vous n'avez pas d'abonnement</p>
            </div>
        @endforelse

        <div class="row">
            {{ $friends->render('vendor.pagination.bootstrap-4') }}
        </div>
    @endif
</section>
