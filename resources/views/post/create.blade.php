@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5.5em;">

        <h1> Créer un article </h1>

        @include('post.form')

    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        const $nav = $('nav');
        $nav.removeClass('navbar-transparent');
        $nav.removeAttr('color-on-scroll')
    </script>
    <script src="{{ asset('js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/editeur.js') }}"></script>
@endsection