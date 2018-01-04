<section class="container container-margin-top">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{route('voyage.create')}}">Nouveau voyage</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
                            <td>{{ $voyage->state }}</td>
                            <td>{{ $voyage->dateBegin }}</td>
                            <td>{{ $voyage->dateEnd }}</td>
                            <td>
                                <a class="btn btn-primary btn-block" href="{{route('voyage.show', $voyage)}}">Voir sur une carte</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Vous n'avez aucun voyage.</p>
            @endif
        </div>
    </div>

</section>
