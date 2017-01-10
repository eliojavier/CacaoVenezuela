@extends('layouts.app')

@section('content')
    @include('layouts.flash_message')

    <div class="col-md-11">
        <h2 class="page-header">Recetas</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-7 col-md-offset-2 col-sm-12">
            <h3 class="page-header text-center">Listado de recetas</h3>
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
@endsection

