@extends('layouts.app')

@section('content')
    @include('layouts.flash_message')
    <div class="row margin-top-15">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <h2 class="page-header custom-page-header">Mis recetas</h2>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                <a href="{{ url('misrecetas/' . $recipe->id) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('misrecetas/' . $recipe->id . '/edit') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => 'misrecetas/' . $recipe->id]) !!}
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2 col-sm-12">
            <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
            <a href="{{ url('misrecetas/create') }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar receta
                </button>
            </a>
        </div>
    </div>
@endsection

