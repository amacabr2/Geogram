@forelse($abonnements as $abonnement)
    {{ $abonnement->pseudo }}
@empty
    <p>Vous n'avez aucun abonnements.</p>
@endforelse