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

                <div class="row" id="article" style="border-bottom: #f76234 solid 3px; margin-bottom: 2em; padding-bottom: 1em">
                    <div class="col-md-12">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <h3> Commentaire(s) </h3>
                        </div>
                        <div class="card-body">
                            @forelse($commentaires as $commentaire)
                                <div class="commentaire" style="border-bottom: solid 2px #919191">
                                    <b>
                                        {{ $commentaire->user->pseudo }}
                                        <div class="pull-right">
                                            @if(Auth::user()->id == $post->user_id or Auth::user()->id == $commentaire->user_id)
                                                <i class="fa fa-times confirmModalLink" data-toggle="modal" data-target="#deleteCommentModal" href="{{route('comment.delete', [$commentaire->id, $post->id] )}}"></i>
                                            @endif
                                            @if(Auth::user()->id == $commentaire->user_id)
                                                <i class="fa fa-pencil" data-toggle="modal" data-target="#editCommentModal" data-commentaire="{{ $commentaire }}"></i>
                                            @endif
                                        </div>
                                    </b>
                                    <span> {{ $commentaire->content }} </span>
                                </div>
                            @empty
                                <p> Auncun commantaire pour cet article. </p>
                            @endforelse
                        </div>
                        <div class="card-footer">
                            {!! Form::open(['method' => 'posts', 'route' => ['comment.store', $post->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    {!! Form::label('contenu', 'Votre commentaire') !!}
                                    {!! Form::textarea('contenu', '', ['class' => 'form-control', 'rows' => 5]) !!}
                                </div>
                                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div id="deletePostModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression de l'article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Voulez vous vraiment supprimer cet article ? <br/>
                            Les commentaires correspondants à cet article seront supprimés avec.
                        </p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['method' => 'delete', 'url' => action('PostsController@delete', $post), 'style' => 'width: 100%']) !!}
                            <button class="btn btn-primary" style="width: 100%" type="submit" value="Supprimer">Supprimer l'article</button>
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="deleteCommentModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression du commentaire </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Voulez vous vraiment supprimer ce commentaire ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" id="confirmModalYes" style="width: 100%">Suppression</a>
                        <button type="button" class="btn btn-secondary" id="confirmModalNo" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="editCommentModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modification du commentaire </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['method' => 'put', 'route' => ['comment.update', $commentaire->id, $post->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label('contenu', 'Votre commentaire') !!}
                            {!! Form::textarea('contenu', $commentaire->content , ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Envoyer', ['class' => 'btn btn-primary', 'style' => 'width: 100%']) !!}
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-secondary" id="confirmModalNo" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('javascript')

    <script type="text/javascript">

        //modal suppression commentaire
        $(document).ready(function() {
            let theHREF;
            $(".confirmModalLink").click(function(e) {
                e.preventDefault();
                theHREF = $(this).attr("href");
                $("#deleteCommentModal").modal("show");
            });
            $("#confirmModalNo").click(function(e) {
                $("#deleteCommentModal").modal("hide");
            });
            $("#confirmModalYes").click(function(e) {
                window.location.href = theHREF;
            });
        });

        //modifier commentaire
        $('#editCommentModal').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            let com = $(e.relatedTarget).data('commentaire');
            //populate the textbox
            $(e.currentTarget).find('input[name="bookId"]').val(com);
        });

        //barre navigation
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')

    </script>

@endsection