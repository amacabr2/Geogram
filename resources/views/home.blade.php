@extends('layouts.app')

@section('content')
    <section class="wrapper">
        @include('includes.little-page-header')

        <section class="news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="starter-template text-center">
                            <h1>Votre fil d'actulité</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse($posts as $post)
                            <div class="row">
                                <div class="card">
                                    <div class="card-header"><b>{{ $post->pseudo }}</b></div>
                                    <div class="card-body">
                                        <h4> {{ $post->title }} </h4>
                                        <h5> Pays visité : {{ $post->state }} </h5>
                                        <p> Création de l'article : {{ $post->created_at }} </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-10"></div>
                                            <div class="col-md-2">
                                                <a class="btn btn-primary" href="{{route('post.show', $post)}}" >Voir le post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Votre file d'actualité est vide. Abonnez-vous à des utilisateurs pour voir leurs articles.</p>
                        @endforelse

                        <div class="row">
                            {{ $posts->render('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        (function($){
            const $windows = $(window);
            const $title = $('.starter-template.text-center h1')
            $windows.trigger('scroll');

            $windows.scroll(function (e) {
                let scrollTop = $windows.scrollTop()
                if (scrollTop > 100) {
                    console.log("blanc")
                    $title.css('color', '#ffffff')
                } else {
                    console.log("noir")
                    $title.css('color', '#010101')
                }
            });
        })(jQuery);
    </script>
@endsection