@extends('layouts.dashboard')

@section('content')
    <h1 class="page-header tex-center">Detalle receta</h1>
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
            {!!Form::label('preparation','Preparación: ')!!}
            {!!Form::label('preparation', $recipe->preparation)!!}
        </div>
        <div class="form-group">
            {!!Form::label('ingredients','Ingredientes: ')!!}
            <p> @foreach($recipe->ingredients as $ingredient)
                    {{$ingredient->name . " - "}}
                @endforeach
            </p>
        </div>
        <div class="form-group">
            {!!Form::label('serves','Raciones: ')!!}
            {!!Form::label('serves', $recipe->serves)!!}
        </div>
        <a href="{{ url('admin/votaciones/' . $recipe->id) }}">
            <button type="button" class="btn btn-default">
                Votar
            </button>
        </a>
    </div>
@endsection
