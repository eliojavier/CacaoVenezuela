@extends('layouts.dashboard')

@section('content')
    @include('layouts.flash_message')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Jueces</h2>
        </div>

        <div class="col-md-3 col-sm-12">
            <h3 class="page-header">Agregar juez</h3>
            {!!Form::open(['url'=>'admin/jueces'])!!}
            @include('admin.judges.form',['submitButtonText' => 'Agregar'])
            {!!Form::close()!!}
        </div>

        <div class="col-md-8 col-sm-12">
            <h3 class="page-header text-center">Listado de jueces</h3>
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover top-margin-25">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        @if(Auth::user()->hasRole('super_admin'))
                            <th>Editar</th>
                            <th>Borrar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($judges as $judge)
                        <tr>
                            <td>{{$judge->name}}</td>
                            <td>{{$judge->email}}</td>
                            <td>{{$judge->phone}}</td>
                            @if(Auth::user()->hasRole('super_admin'))
                            <td>
                                <a href="{{ url('admin/jueces/' . $judge->id . '/edit') }}">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/jueces', $judge], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                {!!Form::close()!!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

