@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <section class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url({{ asset('img/bg5.jpg') }})"></div>

            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src="{{ asset('img/ryan.jpg') }}" alt="">
                    </div>
                    <h3 class="title">{{ $user->firstName }} {{ $user->lastName }}</h3>
                    <p class="catagory">{{ $user->job }}</p>
                    <div class="content">
                        <div class="social-description">
                            <h2>{{ count($abonnements) }}</h2>
                            <p>Abonnements</p>
                        </div>
                        <div class="social-description">
                            <h2> {{ count($abonnes) }} </h2>
                            <p>Abonnés</p>
                        </div>
                        <div class="social-description">
                            <h2> {{ count($articles) }} </h2>
                            <p>Articles</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="button-container">
                    <a href="#button" class="btn btn-primary btn-round btn-lg">Follow</a>
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>

                @if (Auth::id() == $user->id )
                    @include('profil.includes.administration')
                @else
                    @include('profil.includes.presentation')
                @endif
            </div>
        </section>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        (function($){
            $('body').addClass('profile-page')
            $('.card-flip').classList.toggle("flip");
        })(jQuery);
    </script>
@endsection