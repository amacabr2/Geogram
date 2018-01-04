<section class="container container-margin-top">
    @if(Auth::id() == $user->id)
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{route('post.create')}}">Nouvel article</a>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            @forelse($articles as $article)
                <div class="row"  style="width: 100%">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>{{ $article->user->pseudo }}</b></div>
                            <div class="card-body">
                                <h4> {{ $article->title }} </h4>
                                <h5> Pays visité : {{ $article->voyage->state }} </h5>
                                <p> Création de l'article : {{ $article->created_at }} </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5>Commentaire(s)</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary" href="{{route('post.show', $article)}}" >Voir le post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Vous n'avez aucun articles.</p>
            @endforelse
        </div>
    </div>
</section>