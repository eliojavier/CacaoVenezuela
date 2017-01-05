@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Votaciones realizadas</h2>
    </div>

    <div class="row margin-top-15">
        @foreach($recipes as $recipe)
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Receta</th>
                            <th>Modalidad</th>
                            <th>Ingredientes</th>
                            <th>Preparación</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                {{$recipe->ingredients}}
                            </td>
                            <td>{{$recipe->directions}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($recipe->votes as $vote)
               <p> Criterio: {{$vote->criterion->criterion}}</p>
               <p> Puntuación: {{$vote->score}}</p>
               <p> Juez: {{$vote->judge->name . ' ' . $vote->judge->last_name}}</p>
                <div class="page-header"></div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="text-center">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection