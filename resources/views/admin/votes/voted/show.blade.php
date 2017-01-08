@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Votaciones realizadas</h2>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('admin/votaciones/realizadas') }}">
                <button type="button" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive  margin-top-15">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ingredientes</th>
                        <th>Preparación</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
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
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($recipe->votesBySpecificJudge as $vote)
                <p> Criterio: {{$vote->criterion->criterion}}</p>
                <p> Puntuación: {{$vote->score}}</p>
                <p> Juez: {{$vote->user->name . ' ' . $vote->user->last_name}}</p>
                <div class="page-header"></div>
            @endforeach
        </div>
    </div>



@endsection