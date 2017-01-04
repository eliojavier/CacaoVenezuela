@extends('layouts.dashboard')

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
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <a href="{{ url('admin/votaciones/' . $recipe->id) }}">
                <button type="button" class="btn btn-success">
                    Votar
                </button>
            </a>
        </div>
    </div>
@endsection
