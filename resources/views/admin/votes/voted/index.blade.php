@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Votaciones realizadas</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-9 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ingredientes</th>
                        <th>Preparación</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                {{$recipe->ingredients}}
                            </td>
                            <td>{{$recipe->directions}}</td>
                            <td>
                                <a href="{{ url('admin/votaciones/realizadas/' . $recipe->id) }}">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection