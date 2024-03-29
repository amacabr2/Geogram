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
                    <p>Pays visité : <a href="{{ route('voyage.show', $post->voyage->id) }}">{{ $post->voyage->state }}</a>.</p>
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
                        {!! $post->content !!}
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
                                                <i class="fa fa-times" data-toggle="modal" data-target="#deleteCommentModal" data-commentaire-id="{{ $commentaire->id }}"></i>
                                            @endif
                                            @if(Auth::user()->id == $commentaire->user_id)
                                                <i class="fa fa-pencil" data-toggle="modal" data-target="#editCommentModal" data-commentaire-id="{{ $commentaire->id }}" data-commentaire-content="{{ $commentaire->content }}"></i>
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
                        {!! Form::open(['method' => 'delete', 'url' => action('PostsController@delete'), 'style' => 'width: 100%']) !!}
                            <input name="idPost" type="hidden" value="{{ $post->id }}"/>
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
                        {!! Form::open(['method' => 'delete', 'url' => action('CommentairesController@delete', $post->id), 'style' => 'width: 100%']) !!}
                            <input name="idCommentaire" type="hidden"/>
                            <button class="btn btn-primary" style="width: 100%" type="submit" value="Supprimer">Supprimer le commentaire</button>
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="editCommentModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modification du commentaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['id' => 'comForm', 'method' => 'put', 'route' => ['comment.update', $post->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input name="idCommentaire" type="hidden"/>
                        <div class="form-group">
                            {!! Form::label('contenu', 'Votre commentaire') !!}
                            {!! Form::textarea('contenu', '' , ['class' => 'form-control', 'id' => 'comContent']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Modifier', ['class' => 'btn btn-primary', 'style' => 'width: 100%']) !!}
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
        $('#deleteCommentModal').on('show.bs.modal', function(e) {
            let comId = $(e.relatedTarget).data('commentaire-id');
            $(e.currentTarget).find('input[name="idCommentaire"]').val(comId);
        });

        //modifier commentaire
        $('#editCommentModal').on('show.bs.modal', function(e) {
            let comId = $(e.relatedTarget).data('commentaire-id');
            let comContent = $(e.relatedTarget).data('commentaire-content');
            $(e.currentTarget).find('input[name="idCommentaire"]').val(comId);
            $("#comContent").html(comContent);
        });

        //barre navigation
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')

    </script>

@endsection