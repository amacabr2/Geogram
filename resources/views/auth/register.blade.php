@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pseudo *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required autofocus>

                                @if ($errors->has('pseudo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName" class="col-md-4 control-label">Nom *</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" required>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="firstName" class="col-md-4 control-label">Prénom *</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstName" required>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Pays *</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" required>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('codePostal') ? ' has-error' : '' }}">
                            <label for="codePostal" class="col-md-4 control-label">Code postal *</label>

                            <div class="col-md-6">
                                <input id="codePostal" type="text" class="form-control" name="codePostal" required>

                                @if ($errors->has('codePostal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codePostal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <label for="adresse" class="col-md-4 control-label">Adresse *</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control" name="adresse" required>

                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                            <label for="birthDate" class="col-md-4 control-label">Date de naissance *</label>

                            <div class="col-md-6">
                                <input id="birthDate" type="text" class="form-control" name="birthDate" required>

                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                            <label for="job" class="col-md-4 control-label">Profession</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control" name="job">

                                @if ($errors->has('job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" >

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('couverture') ? ' has-error' : '' }}">
                            <label for="couverture" class="col-md-4 control-label">Couverture</label>

                            <div class="col-md-6">
                                <input id="couverture" type="file" class="form-control" name="couverture">

                                @if ($errors->has('couverture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('couverture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lienFacebook') ? ' has-error' : '' }}">
                            <label for="lienFacebook" class="col-md-4 control-label">Lien Facebook</label>

                            <div class="col-md-6">
                                <input id="lienFacebook" type="text" class="form-control" name="lienFacebook">

                                @if ($errors->has('job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lienFacebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lienInstagram') ? ' has-error' : '' }}">
                            <label for="lienInstagram" class="col-md-4 control-label">Line Instagram</label>

                            <div class="col-md-6">
                                <input id="lienInstagram" type="text" class="form-control" name="lienInstagram">

                                @if ($errors->has('lienInstagram'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lienInstagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lienTwitter') ? ' has-error' : '' }}">
                            <label for="lienTwitter" class="col-md-4 control-label">Lien Twitter</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control" name="lienTwitter">

                                @if ($errors->has('lienTwitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lienTwitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lienGoogle') ? ' has-error' : '' }}">
                            <label for="lienGoogle" class="col-md-4 control-label">Lien Google</label>

                            <div class="col-md-6">
                                <input id="lienGoogle" type="text" class="form-control" name="lienGoogle">

                                @if ($errors->has('lienGoogle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lienGoogle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmation mot de passe *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
