@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url({{ asset('/img/bg6.jpg') }})"></div>

            <div class="container">
                <div class="content-center">
                    <h1 class="title">Geogram</h1>
                    <div class="text-center">
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

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
                                        <p> {{ $post->content }} </p>
                                        <a class="btn btn-primary" {{--href="{{route('posts.show', $post)}}"--}} >Voir le post</a>
                                    </div>
                                    <div class="card-footer">
                                        <h5>Commentaire(s)</h5>
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