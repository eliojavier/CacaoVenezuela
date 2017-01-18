@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 margin-top-40">
            <div class="panel panel-primary">
                <div class="panel-heading">Inscribir receta</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'misrecetas', 'files'=>true]) !!}
                        @include('app.recipes.form', ['submitButtonText' => 'Inscribir', 'action'=>'create'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

