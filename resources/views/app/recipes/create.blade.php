@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url' => 'misrecetas', 'files'=>true]) !!}
            @include('app.recipes.form', ['submitButtonText' => 'Inscribir', 'action'=>'create'])
        {!! Form::close() !!}
    </div>
@endsection

