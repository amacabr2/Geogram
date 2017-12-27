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

            </div>

            <div class="col-md-9">

                <div id="map"></div>

            </div>


        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" >Retour au profil</a>
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