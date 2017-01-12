@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Votaciones realizadas</h2>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="table-responsive  margin-top-15">
                <table id="table" class="table table-striped table-hover">
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
        <div class="col-md-8 col-md-offset-1 text-center">
            @foreach($recipe->votesBySpecificJudge as $vote)
                <p> <strong>{{$vote->criterion->criterion}}: </strong>{{$vote->score}}</p>
                <p> </p>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-1 text-center">
            <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
            <a href="{{ url('admin/votaciones/' . $recipe->id .'/edit') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar votación
                </button>
            </a>
        </div>
    </div>
@endsection