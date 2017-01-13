@extends('layouts.dashboard')

@section('content')
    <h2 class="page-header tex-center">Detalle receta</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>{{$recipe->name}}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-borderless table-hover">
                        <tr>
                            <td><strong>Participante:</strong></td>
                            <td class="text-justify">
                                <a href="{{ url('admin/participantes/' . $recipe->user->id) }}"> {{$recipe->user->name . " " . $recipe->user->last_name}} </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Modalidad:</strong></td>
                            <td class="text-justify">{{$recipe->modality}}</td>
                        </tr>
                        <tr>
                            <td><strong>Ingredientes:</strong></td>
                            <td class="text-justify">{{$recipe->ingredients}}</td>
                        </tr>
                        <tr>
                            <td><strong>Preparación: </strong></td>
                            <td class="text-justify">{{$recipe->directions}}</td>
                        </tr>
                        <tr>
                            <td><strong>Raciones:</strong></td>
                            <td class="text-justify">{{$recipe->serves}}</td>
                        </tr>
                        <tr>
                            <td><strong>Imagen:</strong></td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="{{ URL::previous() }}">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                        </button>
                    </a>
                    @if ($voted==0)
                        <a href="{{ url('admin/votaciones/create/' . $recipe->id) }}">
                            <button type="button" class="btn btn-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Votar
                            </button>
                        </a>
                    @else
                        <a href="{{ url('admin/votaciones/realizadas/' . $recipe->id) }}">
                            <button type="button" class="btn btn-success">
                                Ver votación
                            </button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
