@extends('layouts.app')

@section('content')
    <section class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image: url({{ asset('/img/login.jpg') }})"></div>

        <div class="container">
            <div class="col-md-8 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="{{ asset('img/now-logo.png') }}" alt="">
                            </div>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @if ($errors->has('pseudo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="content">
                            <div class="input-group form-group-no-border input-lg {{ $errors->has('pseudo') ? 'is-invalid' : 'is-valid' }}">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required autofocus>
                            </div>

                            <div class="input-group form-group-no-border input-lg {{ $errors->has('password') ? 'is-invalid' : 'is-valid' }}">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                                Connecte-toi
                            </button>
                        </div>

                        <div class="pull-left">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Se rappelez de moi
                                </label>
                            </div>
                        </div>

                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('register') }}" class="link">Créer un compte ?</a>
                            </h6>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        (function($){
            $('body').addClass('login-page')

            $('footer').remove()
        })(jQuery);
    </script>
@endsection