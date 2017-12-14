@extends('layouts.app')

@section('content')

    <section class="wrapper">
        <section class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/header.jpg') }}')"></div>

            <div class="container">
                <div class="content-center brand">
                    <img src="{{ asset('img/nom-logo.png') }}" alt="" class="n-logo">
                    <h1 class="h1-seo">{{ config('app.name', 'Laravel') }}</h1>
                    <h3>Partage tes vacances au reste du monde</h3>
                </div>
            </div>
        </section>

        <section class="section section-images">
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
        </section>

        <section class="section section-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Qu'est ce que ce site ?</h2>
                        <h5 class="description">
                            Pour commencer c'est le plus beau, le plus fabuleux, le plus extraordinaire des sites
                            que tu pourras voir de ta vie... hou là, je m'emporte.
                        </h5>
                    </div>
                </div>

                <div class="separator separator-primary"></div>

                <div class="section-story-overview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image-container image-left" style="background-image: url('{{ asset('img/login.jpg') }}')">
                                <p class="blockquote blockquote-primary">
                                    Le voyageur est celui qui se donne le temps de la rencontre et de l'échange.
                                    <br><br>
                                    <small>Frédéric Lecloux</small>
                                </p>
                            </div>
                            <div class="image-container" style="background-image: url('{{ asset('img/bg3.jpg') }}')"></div>
                        </div>

                        <div class="col-md-5">
                            <div class="image-container image-right" style="background-image: url('{{ asset('img/bg1.jpg') }}')"></div>
                            <h3>Partage tes voyages</h3>
                            <p>
                                Ce site est un réseau social spécialement conçut pour partager avec les autres tes voyages.
                                Cela peut être un voyage à l'autre bout de la terre ou dans ton pays ou même une simple promenade à côté de chez toi.
                            </p>
                            <p>
                                Tu vas pouvoir créer des articles pour les partager à tes abonnés et tu pourras aussi suivre des gens pour savoir où est-ce que eux ont été.
                            </p>
                            <p>
                                Ce site est donc là pour te faire partager ton vécu, découvrir de nouveaux lieux qui te donnerons peut-être
                                de nouvelles idées de voyage et tu pourras pourquoi pas faire de nouvelles connaissances.
                            </p>
                            <p>
                                Dis-toi que le monde ne cherche qu'à être exploré (en respectant la nature bien évidemment), donc n'hésite pas,
                                fonce, voyage et reviens nous en parler sur ce beau réseau.
                            </p>
                            <h3>Sur ce, bienvenue.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-team text-center">
            <div class="container">
                <h2 class="title">L'équipe</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="team-player">
                                <img src="{{ asset('img/anthony.jpg') }}" alt="" class="rounded-circle img-fluid img-raised" style="width: 200px">
                                <h4 class="title">Anthony Macabrey</h4>
                                <p class="category text-primary">Développeur web & mobile</p>
                                <p class="description">
                                    Etudiant à l'IUT de Belfort-Montbélliard, je prépare une licence professionnelle Mobilité Numérique,
                                    parcour TeProW pour devenir développeur web et mobile.
                                </p>
                                <a href="https://www.facebook.com/anthony.macabrey" class="btn btn-primary btn-icon btn-round"><i class="fa fa-twitter"></i></a>
                                <a href="https://twitter.com/macabrey70" class="btn btn-primary btn-icon btn-round"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="team-player">
                                <img src="" alt="" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Sylvain Macabrey</h4>
                                <p class="category text-primary">On sait pas</p>
                                <p class="description">
                                   Bof
                                </p>
                                <a href="#a" class="btn btn-primary btn-icon btn-round"><i class="fa fa-twitter"></i></a>
                                <a href="#a" class="btn btn-primary btn-icon btn-round"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection