@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/header.jpg') }}')"></div>

            <div class="container">
                <div class="content-center brand">
                    <img src="{{ asset('img/nom-logo.png') }}" alt="" class="n-logo">
                    <h1 class="h1-seo">{{ config('app.name', 'Laravel') }}</h1>
                    <h3>Partage tes vacances au reste du monde</h3>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="section section-images">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-images-container">
                                <img src="{{ asset("img/hero-image-1.png") }}" alt="">
                            </div>
                            <div class="hero-images-container-1">
                                <img src="{{ asset("img/hero-image-2.png") }}" alt="">
                            </div>
                            <div class="hero-images-container-2">
                                <img src="{{ asset("img/hero-image-3.png") }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection