@extends('layouts.app')

@section('content')
<section class="container" style="margin-top: 6em">
    <div class="row">
        <div class="col-md-6">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">Inscrit-toi</h4>
                   @if($errors->any())
                       <span class="invalid-feedback">
                           <b>Erreur dans le formulaire</b>
                       </span>
                   @endif
               </div>

               <div class="card-body">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-12">
                               <h6 class="card-subtitle mb-2 text-muted">* : champs obligatoire</h6>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-md-12">
                               <form class="form-horizontal" method="POST" action="{{ route('register') }}"
                                     enctype="multipart/form-data">
                                   {{ csrf_field() }}

                                   <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                                       <label for="name" class="col-md-4 control-label">Pseudo *</label>

                                       <div class="col-md-12">
                                           <input id="name" type="text"
                                                  class="form-control @if($errors->has('pseudo')) {{ "is-invalid" }}@endif"
                                                  name="pseudo" value="{{ old('pseudo') }}" required autofocus>

                                           @if ($errors->has('pseudo'))
                                               <span class="invalid-feedback">
                                                <strong>{{ $errors->first('pseudo') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                       <label for="lastName" class="col-md-4 control-label">Nom *</label>

                                       <div class="col-md-12">
                                           <input id="lastName" type="text"
                                                  class="form-control @if($errors->has('lastName')) {{ "is-invalid" }}@endif"
                                                  name="lastName" value="{{ old('lastName') }}" required>

                                           @if ($errors->has('lastName'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('lastName') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                       <label for="firstName" class="col-md-4 control-label">Prénom *</label>

                                       <div class="col-md-12">
                                           <input id="firstName" type="text"
                                                  class="form-control @if($errors->has('firstName')) {{ "is-invalid" }}@endif"
                                                  name="firstName" value="{{ old('firstName') }}" required>

                                           @if ($errors->has('firstName'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('firstName') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('sexe') ? ' has-error' : '' }}">
                                       <label for="sexe" class="col-md-4 control-label">Sexe *</label>

                                       <div class="col-md-12">
                                           <div class="radio">
                                               <input type="radio" name="sexe" id="sexe1" value="homme" checked>
                                               <label for="sexe1">
                                                   Homme
                                               </label>
                                           </div>

                                           <div class="radio">
                                               <input type="radio" name="sexe" id="sexe2" value="femme">
                                               <label for="sexe2">
                                                   Femme
                                               </label>
                                           </div>

                                           @if ($errors->has('sexe'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('sexe') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                       <label for="email" class="col-md-4 control-label">Email *</label>

                                       <div class="col-md-12">
                                           <input id="email" type="email"
                                                  class="form-control @if($errors->has('email')) {{ "is-invalid" }}@endif"
                                                  name="email" value="{{ old('email') }}" required>

                                           @if ($errors->has('email'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                       <label for="state" class="col-md-4 control-label">Pays *</label>

                                       <div class="col-md-12">
                                           <input id="state" type="text"
                                                  class="form-control @if($errors->has('state')) {{ "is-invalid" }}@endif"
                                                  name="state" value="{{ old('state') }}" required>

                                           @if ($errors->has('state'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('state') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('codePostal') ? ' has-error' : '' }}">
                                       <label for="codePostal" class="col-md-4 control-label">Code postal *</label>

                                       <div class="col-md-12">
                                           <input id="codePostal" type="text"
                                                  class="form-control @if($errors->has('codePostal')) {{ "is-invalid" }}@endif"
                                                  name="codePostal" value="{{ old('codePostal') }}" required>

                                           @if ($errors->has('codePostal'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('codePostal') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                                       <label for="adresse" class="col-md-5 control-label">Adresse *</label>

                                       <div class="col-md-12">
                                           <input id="adresse" type="text"
                                                  class="form-control @if($errors->has('adresse')) {{ "is-invalid" }}@endif"
                                                  name="adresse" value="{{ old('adresse') }}" required>

                                           @if ($errors->has('adresse'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('adresse') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                                       <label for="birthDate" class="col-md-5 control-label">Date de naissance *</label>

                                       <div class="col-md-12">
                                           <input id="birthDate" type="date"
                                                  class="form-control @if($errors->has('birthDate')) {{ "is-invalid" }}@endif"
                                                  name="birthDate" value="{{ old('birthDate') }}" required>

                                           @if ($errors->has('birthDate'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('birthDate') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                       <label for="job" class="col-md-4 control-label">Profession</label>

                                       <div class="col-md-12">
                                           <input id="job" type="text"
                                                  class="form-control @if($errors->has('job')) {{ "is-invalid" }}@endif"
                                                  name="job" value="{{ old('job') }}">

                                           @if ($errors->has('job'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('job') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                       <label for="description" class="col-md-4 control-label">Description</label>

                                       <div class="col-md-12">
                                       <textarea id="description"
                                                 class="form-control @if($errors->has('description')) {{ "is-invalid" }}@endif"
                                                 name="description">{{ old('description') }}</textarea>

                                           @if ($errors->has('description'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('description') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                       <label for="avatar" class="col-md-4 control-label">Avatar</label>

                                       <div class="col-md-12">
                                           <input id="avatar" type="file"
                                                  class="form-control @if($errors->has('avatar')) {{ "is-invalid" }}@endif"
                                                  name="avatar" value="{{ old('avatar') }}">

                                           @if ($errors->has('avatar'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('avatar') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('couverture') ? ' has-error' : '' }}">
                                       <label for="couverture" class="col-md-4 control-label">Couverture</label>

                                       <div class="col-md-12">
                                           <input id="couverture" type="file"
                                                  class="form-control @if($errors->has('couverture')) {{ "is-invalid" }}@endif"
                                                  name="couverture" value="{{ old('couverture') }}">

                                           @if ($errors->has('couverture'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('couverture') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('lienFacebook') ? ' has-error' : '' }}">
                                       <label for="lienFacebook" class="col-md-4 control-label">Lien Facebook</label>

                                       <div class="col-md-12">
                                           <input id="lienFacebook" type="text"
                                                  class="form-control @if($errors->has('lienFacebook')) {{ "is-invalid" }}@endif"
                                                  name="lienFacebook" value="{{ old('lienFacebook') }}">

                                           @if ($errors->has('job'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('lienFacebook') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('lienInstagram') ? ' has-error' : '' }}">
                                       <label for="lienInstagram" class="col-md-4 control-label">Line Instagram</label>

                                       <div class="col-md-12">
                                           <input id="lienInstagram" type="text"
                                                  class="form-control @if($errors->has('lienInstagram')) {{ "is-invalid" }}@endif"
                                                  name="lienInstagram" value="{{ old('lienInstagram') }}">

                                           @if ($errors->has('lienInstagram'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('lienInstagram') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('lienTwitter') ? ' has-error' : '' }}">
                                       <label for="lienTwitter" class="col-md-4 control-label">Lien Twitter</label>

                                       <div class="col-md-12">
                                           <input id="job" type="text"
                                                  class="form-control @if($errors->has('lienTwitter')) {{ "is-invalid" }}@endif"
                                                  name="lienTwitter" value="{{ old('lienTwitter') }}">

                                           @if ($errors->has('lienTwitter'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('lienTwitter') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('lienGoogle') ? ' has-error' : '' }}">
                                       <label for="lienGoogle" class="col-md-4 control-label">Lien Google</label>

                                       <div class="col-md-12">
                                           <input id="lienGoogle" type="text"
                                                  class="form-control @if($errors->has('lienGoogle')) {{ "is-invalid" }}@endif"
                                                  name="lienGoogle" value="{{ old('lienGoogle') }}">

                                           @if ($errors->has('lienGoogle'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('lienGoogle') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                       <label for="password" class="col-md-4 control-label">Mot de passe *</label>

                                       <div class="col-md-12">
                                           <input id="password" type="password"
                                                  class="form-control @if($errors->has('password')) {{ "is-invalid" }}@endif"
                                                  name="password" required>

                                           @if ($errors->has('password'))
                                               <span class="invalid-feedback">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                           @endif
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="password-confirm" class="col-md-6 control-label">Confirmation mot de
                                           passe *</label>

                                       <div class="col-md-12">
                                           <input id="password-confirm" type="password"
                                                  class="form-control @if($errors->has('password-confirm')) {{ "is-invalid" }}@endif"
                                                  name="password_confirmation" required>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <div class="col-md-12 col-md-offset-4">
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
        </div>

        <div class="col-md-6">
            <img src="{{ asset('img/bg1.jpg') }}" alt="" class="img-fluid img-raised img-apparition">
            <img src="{{ asset('img/bg3.jpg') }}" alt="" class="img-fluid img-raised img-apparition">
            <img src="{{ asset('img/bg4.jpg') }}" alt="" class="img-fluid img-raised img-apparition">
            <img src="{{ asset('img/bg5.jpg') }}" alt="" class="img-fluid img-raised img-apparition">
            <img src="{{ asset('img/bg6.jpg') }}" alt="" class="img-fluid img-raised img-apparition">
        </div>

    </div>
</section>
@endsection

@section('javascript')
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent')
        $nav.removeAttr('color-on-scroll')
    </script>
@endsection