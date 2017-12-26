<?php

if($voyage->id) {
    $options = ['method' => 'put', 'route' => ['voyage.update', $voyage->id], 'class' => 'form-horizontal', 'files' => true];
} else {
    $options = ['method' => 'posts', 'route' => ['voyage.store'], 'class' => 'form-horizontal', 'files' => true];
}

?>

<div class="col-md-12">
    {!! Form::open($options) !!}
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
            {!! Form::label('state', 'Nom du pays') !!}
            {!! Form::text('state', $voyage->state, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('longitude', 'Longitude') !!}
            {!! Form::text('longitude', $voyage->longitude, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('latitude', 'Latitude') !!}
            {!! Form::text('latitude', $voyage->latitude, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dateBegin', 'Date de début') !!}
            {!! Form::date('dateBegin', $voyage->dateBegin, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dateEnd', 'Date de fin') !!}
            {!! Form::date('dateEnd', $voyage->dateEnd, ['class' => 'form-control']) !!}
        </div>

        @if($voyage->id)
            {!! Form::submit('Modifier', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" >Annuler</a>
        @else
            {!! Form::submit('Créer', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" >Annuler</a>
        @endif
    {!! Form::close() !!}
</div>