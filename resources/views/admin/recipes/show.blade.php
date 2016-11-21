@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row margin-top-15">
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
                <select id="example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>


            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')
<script>
    $('example').barrating('show');
</script>
@endsection