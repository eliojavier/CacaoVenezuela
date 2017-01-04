@extends('layouts.dashboard')

@section('content')
    <div class="col-md-11">
        <h2 class="page-header">Recetas</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-9 col-md-offset-1 col-sm-12">
            <h3 class="page-header text-center">Listado de recetas</h3>
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ver</th>
                        <th>Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            {{--<td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>--}}
                            <td>{{$recipe->user->name}}</td>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                <a href="{{ url('admin/recetas/' . $recipe->id) }}">
                                    <button type="button" class="btn btn-default">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/recetas', $recipe], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                    <button type="submit" class="btn btn-default">
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

