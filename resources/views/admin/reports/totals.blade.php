@extends('layouts.dashboard')

@section('content')
    <div class="margin-top-15">
        <div class="col-md-8 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <colgroup>
                        <col class="col-md-2">
                        <col class="col-md-2">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th># Participantes</th>
                        <td>{{$number_of_participants}}</td>
                    </tr>
                    <tr>
                        <th># Recetas</th>
                        <td>{{$number_of_recipes}}</td>
                    </tr>
                    <tr>
                        <th># Recetas - dulce</th>
                        <td>{{$number_of_recipes_per_dulce_modality}}</td>
                    </tr>
                    <tr>
                        <th># Recetas - salado</th>
                        <td>{{$number_of_recipes_per_salado_modality}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
