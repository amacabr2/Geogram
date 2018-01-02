@extends('layouts.app')

@section('content')
    <section class="wrapper">
        @include('includes.little-page-header')

        <section class="users">
            <div class="container" style="margin-top: 3em;">
                @forelse(array_chunk($users->all(), 3) as $row)
                    <div class="row">
                        @foreach($row as $user)
                            <div class="col-md-4">
                                <a href="{{ route('profil', ['id' => $user->id]) }}">
                                    <div class="card">
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
                                                <p class="text-center small">{{ $user->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div class="row">
                        <p>Pas de résultat</p>
                    </div>
                @endforelse

                <div class="row">
                    {{ $users->render('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </section>
    </section>

@endsection