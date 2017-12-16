@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @forelse($posts as $post)
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $post->pseudo }}</div>
                                <div class="panel-body">
                                    <h4> {{ $post->title }} </h4>
                                    <h5> Pays visité : {{ $post->state }} </h5>
                                    <p> {{ $post->content }} </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Votre file d'actualité est vide. Abonnez-vous à des utilisateurs pour voir leurs articles.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
