<div class="container" style="margin-top: 2em;">
    @if(session('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            {!! Form::open([
                'method' => 'put',
                'route' => ['users.update', Auth::user()->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}
            <div class="form-group {{ $errors->has('pseudo') ? 'has-error' : '' }}">
                {!! Form::label('pseudo', 'Pseudo', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('pseudo', Auth::user()->pseudo, ['class' => $errors->has('pseudo') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('pseudo'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('pseudo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                {!! Form::label('lastName', 'Nom', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('lastName', Auth::user()->lastName, ['class' => $errors->has('lastName') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('lastName'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                {!! Form::label('firstName', 'Prénom', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('firstName', Auth::user()->firstName, ['class' => $errors->has('firstName') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('firstName'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group  {{ $errors->has('sexe') ? 'has-error' : '' }}">
                {!! Form::label('sexe', 'Sexe', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    <div class="radio">
                        {!! Form::radio('sexe', 'homme', Auth::user()->sexe == "homme" ? true : false, ['id' => 'sexe1']) !!}
                        <label for="sexe1">Homme</label>
                    </div>
                    <div class="radio">
                        {!! Form::radio('sexe', 'femme', Auth::user()->sexe == "femme" ? true : false, ['id' => 'sexe2']) !!}
                        <label for="sexe2">Femme</label>
                    </div>
                    @if ($errors->has('sexe'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sexe') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::email('email', Auth::user()->email, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                {!! Form::label('state', 'Pays', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('state', Auth::user()->state, ['class' => $errors->has('state') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('state'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('codePostal') ? 'has-error' : '' }}">
                {!! Form::label('codePostal', 'Code postal', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('codePostal', Auth::user()->codePostal, ['class' => $errors->has('codePostal') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('codePostal'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('codePostal') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                {!! Form::label('adresse', 'Addresse', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('adresse', Auth::user()->adresse, ['class' => $errors->has('adresse') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('adresse'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('adresse') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('birthDate') ? 'has-error' : '' }}">
                {!! Form::label('birthDate', 'Date de naissance', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::date('birthDate', Auth::user()->birthDate, ['class' => $errors->has('birthDate') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('birthDate'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('birthDate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::textarea('description', Auth::user()->description, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                {!! Form::label('avatar', 'Image de profil', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::file('avatar', ['class' => $errors->has('avatar') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('avatar'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('couverture') ? 'has-error' : '' }}">
                {!! Form::label('couverture', 'Couverture', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::file('couverture', ['class' => $errors->has('couverture') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('couverture'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('couverture') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('job') ? 'has-error' : '' }}">
                {!! Form::label('job', 'Profession', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('job', Auth::user()->job, ['class' => $errors->has('job') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('job'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('job') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lienFacebook') ? 'has-error' : '' }}">
                {!! Form::label('lienFacebook', 'Lien Facebook', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('lienFacebook', Auth::user()->lienFacebook, ['class' => $errors->has('lienFacebook') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('lienFacebook'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lienFacebook') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lienInstagram') ? 'has-error' : '' }}">
                {!! Form::label('lienInstagram', 'Lien Instagram', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('lienInstagram', Auth::user()->lienInstagram, ['class' => $errors->has('lienInstagram') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('lienInstagram'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lienInstagram') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lienTwitter') ? 'has-error' : '' }}">
                {!! Form::label('lienTwitter', 'Lien Twitter', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('lienTwitter', Auth::user()->lienTwitter, ['class' => $errors->has('lienTwitter') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('lienTwitter'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lienTwitter') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lienGoogle') ? 'has-error' : '' }}">
                {!! Form::label('lienGoogle', 'Lien Google', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-12">
                    {!! Form::text('lienGoogle', Auth::user()->lienGoogle, ['class' => $errors->has('lienGoogle') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('lienGoogle'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lienGoogle') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Valider', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>