@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5.5em;">

        <h1> Modifier un article </h1>

        @include('post.formPost')

    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')
    </script>
@endsection