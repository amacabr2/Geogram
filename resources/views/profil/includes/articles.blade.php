@forelse($articles as $article)
    {{ $article->title }}
@empty
    <p>Vous n'avez aucun articles.</p>
@endforelse