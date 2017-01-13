@extends('layouts.dashboard')

@section('content')
    <div class="col-md-11">
        <h2 class="page-header">Reportes - Totales</h2>
    </div>
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-area-chart" aria-hidden="true"></i>
                Reportes
            </div>
            <div class="panel-body">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td><strong># Participantes: </strong>{{$number_of_participants}}</td>
                    </tr>
                    <tr>
                        <td><strong># Recetas: </strong>{{$number_of_recipes}}</td>
                    </tr>
                    <tr>
                        <td><strong># Recetas - dulce: </strong>{{$number_of_recipes_per_dulce_modality}}</td>
                    </tr>
                    <tr>
                        <td><strong># Recetas - salado: </strong>{{$number_of_recipes_per_salado_modality}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
