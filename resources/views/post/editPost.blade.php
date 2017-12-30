@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5.5em;">

        <h1> Modifier un article </h1>

        @include('post.formPost')

    </div>

@endsection

@section('javascript')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/editeur.js') }}"></script>
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')
    </script>
@endsection