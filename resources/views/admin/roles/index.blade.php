@extends('layouts.dashboard')

@section('content')
    @include('layouts.flash_message')

    <div class="col-lg-12">
        <h2 class="page-header">Roles</h2>
    </div>

    <div class="col-md-4 col-sm-12">
        {!!Form::open(['url'=>'admin/roles'])!!}
            @include('admin.roles.form',['submitButtonText' => 'Agregar'])
        {!!Form::close()!!}
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped table-hover top-margin-25">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        @if(Auth::user()->hasRole('super_admin'))
                            <th>Editar</th>
                            <th>Borrar</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            @if(Auth::user()->hasRole('super_admin'))
                                <td>
                                    <a href="{{ url('admin/roles/' . $role->id . '/edit') }}">
                                        <button type="button" class="btn btn-success">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/roles', $role], 'class'=>'form-horizontal', 'role'=>'form']) !!}
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
@endsection