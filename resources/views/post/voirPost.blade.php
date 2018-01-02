@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5.5em;">

        <div class="row">
           <h2> {{ $post->title }} </h2>
        </div>

        <div class="row">

            <div class="col-md-3" style="padding-right: 40px">

                <div class="row">
                    <p>Article de {{ $post->user->firstName }} {{ $post->user->lastName }}.</p>
                </div>

                <div class="row">
                    <p>Pays visité : {{ $post->voyage->state }}.</p>
                </div>

                <div class="row">
                    <p>Article crée le {{ $post->created_at }}</p>
                </div>

                @if(Auth::user()->id == $post->user_id)

                    <div class="row">
                        <a class="btn btn-primary" href="{{route('post.edit', $post)}}" style="width: 100%">Modifier l'article</a>
                    </div>

                    <div class="row">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deletePostModal" style="width: 100%">
                            Supprimer l'article
                        </button>
                    </div>

                @endif

                <div class="row">
                    <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" style="width: 100%">Retour au profil</a>
                </div>

            </div>

            <div class="col-md-9">

                <div class="row" id="article" style="border: 3px #f96332 solid; padding-right: 20px"> {!! $post->content !!} </div>

                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <h3> Commentaire(s) </h3>
                        </div>
                        <div class="card-body">
                            @forelse($commentaires->get() as $commentaire)
                                <div class="commentaire" style="border-bottom: solid 2px #919191">
                                    <b>{{ $commentaire->user->pseudo }}</b> <p> {{ $commentaire->content }} </p>
                                </div>
                            @empty
                                <p> Auncun commantaire pour cet article. </p>
                            @endforelse
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div id="deletePostModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression de  l'article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Voulez vous vraiment supprimer cet articlet ? <br/>
                            Les commentaires correspodants à cet article seront supprimés avec.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" href="{{route('post.delete', $post)}}" style="width: 100%">Suppression</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')
    </script>
@endsection