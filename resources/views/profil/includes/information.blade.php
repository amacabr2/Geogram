<div class="container" style="margin-top: 2em;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-md-12">
        {!! Form::open([
            'method' => 'put',
            'route' => ['users.update', Auth::user()->id],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}
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
                {!! Form::label('pseudo', 'Pseudo') !!}
                {!! Form::text('pseudo', Auth::user()->pseudo, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lastName', 'Nom') !!}
                {!! Form::text('lastName', Auth::user()->lastName, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('firstName', 'Prénom') !!}
                {!! Form::text('firstName', Auth::user()->firstName, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('state', 'Pays') !!}
                {!! Form::text('state', Auth::user()->state, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('codePostal', 'Code postal') !!}
                {!! Form::text('codePostal', Auth::user()->codePostal, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('adresse', 'Addresse') !!}
                {!! Form::text('adresse', Auth::user()->adresse, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthDate', 'Date de naissance') !!}
                {!! Form::date('birthDate', Auth::user()->birthDate, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', Auth::user()->description, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('avatar', 'Image de profil') !!}
                {!! Form::file('avatar', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('couverture', 'Couverture') !!}
                {!! Form::file('couverture', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('job', 'Profession') !!}
                {!! Form::text('job', Auth::user()->job, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lienFacebook', 'Lien Facebook') !!}
                {!! Form::text('lienFacebook', Auth::user()->lienFacebook, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lienInstagram', 'Lien Instagram') !!}
                {!! Form::text('lienInstagram', Auth::user()->lienInstagram, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lienTwitter', 'Lien Twitter') !!}
                {!! Form::text('lienTwitter', Auth::user()->lienTwitter, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lienGoogle', 'Lien Google') !!}
                {!! Form::text('lienGoogle', Auth::user()->lienGoogle, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Valider', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>