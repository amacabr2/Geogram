@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5.5em;">

        <div class="row">

            <div class="col-md-3">

                <div class="row">
                    <p>Voyage fait par {{ $voyage->user->firstName }} {{ $voyage->user->lastName }}.</p>
                </div>

                <div class="row">
                    <p>Début du voyage : {{ $voyage->dateBegin }}.</p>
                </div>

                <div class="row">
                    <p>Fin du voyage : {{ $voyage->dateEnd }}.</p>
                </div>

                <div class="row">
                    <p>Pays visité : {{ $voyage->state }}.</p>
                </div>

                @if(Auth::user()->id == $voyage->user_id)

                    <div class="row">
                        <a class="btn btn-primary" href="{{route('voyage.edit', $voyage)}}" style="width: 100%">Modifier le voyage</a>
                    </div>

                    <div class="row">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteVoyageModal" style="width: 100%">
                            Supprimer le voyage
                        </button>
                    </div>

                @endif

                <div class="row">
                    <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" style="width: 100%">Retour au profil</a>
                </div>

            </div>

            <div class="col-md-9">

                <div id="map"></div>

            </div>

            <div id="deleteVoyageModal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Suppression du voyage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Voulez vous vraiment supprimer ce voyage ? <br/>
                                Les posts correspodants à ce voyage seront supprimés avec.
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['method' => 'delete', 'url' => action('VoyagesController@delete', $voyage), 'style' => 'width: 100%']) !!}
                                <button class="btn btn-primary" style="width: 100%" type="submit" value="Supprimer">Supprimer le voyage</button>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>

@endsection

@section('javascript')
    <script>
        function initMap() {
            //let latitude = 48.866667;
            //let longitude = 2.333333;
            let latitude = {{ $voyage->latitude }};
            let longitude = {{ $voyage->longitude }};
            let voyage = {lat: latitude, lng: longitude};
            let map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: voyage
            });
            let marker = new google.maps.Marker({
                position: voyage,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?keyAIzaSyASfFZlatSHKstyX3kOIhROJ2qxOCiMaRc&callback=initMap">
    </script>
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')
    </script>
@endsection