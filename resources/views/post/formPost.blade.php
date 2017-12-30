<?php

if($post->id) {
    $options = ['method' => 'put', 'route' => ['post.update', $post->id], 'class' => 'form-horizontal', 'files' => true];
} else {
    $options = ['method' => 'posts', 'route' => ['post.store'], 'class' => 'form-horizontal', 'files' => true];
}

?>

<div class="col-md-12">
    {!! Form::open($options) !!}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            {!! Form::label('title', 'Titre de l\'article') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('voyage_id', 'Voyage correspondant à l\'article') !!}
            {!! Form::select('voyage_id', $voyages, $post->voyage_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contenu', 'Contenu de l\'article') !!}
            {!! Form::textarea('contenu', $post->content, [
                'class' => 'form-control',
                'id' => 'editor',
                'data-id' => '{{ $post->id }}' ,
                'data-type' => '{{ get_class($post) }}',
                'data-url' => '{{ route(\'atachements.store\') }}'
            ]) !!}
        </div>

        @if($post->id)
            {!! Form::submit('Modifier', ['class' => 'btn btn-primary']) !!}
        @else
            {!! Form::submit('Créer', ['class' => 'btn btn-primary']) !!}
        @endif
        <a class="btn btn-primary" href="{{route('profil', Auth::user()->id)}}" >Annuler</a>
    {!! Form::close() !!}
</div>

