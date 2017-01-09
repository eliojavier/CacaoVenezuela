@extends('layouts.app')

@section('content')

    <h2 class="page-header tex-center">Detalle receta</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="form-group">
                {!!Form::label('participant','Participante: ')!!}
                {!!Form::label('participant', $recipe->user->name . " " . $recipe->user->last_name)!!}
            </div>
            <div class="form-group">
                {!!Form::label('recipe','Receta: ')!!}
                {!!Form::label('recipe', $recipe->name)!!}
            </div>
            <div class="form-group">
                {!!Form::label('modality','Modalidad: ')!!}
                {!!Form::label('modality', $recipe->modality)!!}
            </div>
            <div class="form-group">
                {!!Form::label('ingredients','Ingredientes: ')!!}
                <p> {{$recipe->ingredients}} </p>
            </div>
            <div class="form-group">
                {!!Form::label('preparation','Preparación: ')!!}
                <p> {{$recipe->directions}} </p>
            </div>
            <div class="form-group">
                {!!Form::label('serves','Raciones: ')!!}
                {!!Form::label('serves', $recipe->serves)!!}
            </div>
            <div class="form-group">
                <a href="{{ url('misrecetas') }}">
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
