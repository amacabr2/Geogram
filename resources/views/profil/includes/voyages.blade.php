<div class="row">
    <p> Ajouter un nouveau voyage ici : </p>
    <a class="btn btn-primary" href="{{route('voyage.create')}}">Nouveau voyage</a>
</div>

<div class="row">
    @if(count($voyages) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">State</th>
                <th scope="col">Début du voyage</th>
                <th scope="col">Fin du voyage</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($voyages as $voyage)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th>{{ $voyage->state }}</th>
                    <th>{{ $voyage->dateBegin }}</th>
                    <th>{{ $voyage->dateEnd }}</th>
                    <th>
                        <a class="btn btn-primary" {{--href="{{route('voyage.create')}}"--}} >Voir sur une carte</a>
                        <a class="btn btn-primary" href="{{route('voyage.edit', $voyage)}}" >Modifier le voyage</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Vous n'avez aucun voyage.</p>
    @endif
</div>

