<section class="container" style="margin-top: 2em">
    @if(Auth::id() == $user->id)
        <div class="row">
            <p> Ajouter un nouvel article ici : </p>
            <a class="btn btn-primary" href="{{route('post.create')}}">Nouvel article</a>
        </div>
    @endif

    <div class="row">
        @forelse($articles as $article)
            <div class="row"  style="width: 100%">
                <div class="card">
                    <div class="card-header"><b>{{ $article->user->pseudo }}</b></div>
                    <div class="card-body">
                        <h4> {{ $article->title }} </h4>
                        <h5> Pays visité : {{ $article->voyage->state }} </h5>
                        <p> {!! $article->content !!} </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Commentaire(s)</h5>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary" {{--href="{{route('article.show', $article)}}"--}} >Voir le post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Vous n'avez aucun articles.</p>
        @endforelse
    </div>
</section>