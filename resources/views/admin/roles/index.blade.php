@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if (session()->has('flash_notification.message'))
            <div id="success-alert" class="alert alert-{{ session('flash_notification.level') }} alert-dismissible fade in text-center">
                <strong> {!! session('flash_notification.message') !!} </strong>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <h2 class="page-header">Roles</h2>
    </div>

    <div class="col-md-4 col-sm-12">
        {!!Form::open(['url'=>'admin/criterios'])!!}
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
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    </script>
@endsection
