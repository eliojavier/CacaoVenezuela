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
        <h2 class="page-header">Asignar roles</h2>
    </div>

    <div class="col-md-4 col-sm-12">
        {!!Form::open(['url'=>'admin/roles/role-attachment'])!!}
            <div class="form-group">
                {!!Form::label('user','Usuario')!!}
                {!!Form::select('user', $select_users, null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('role','Roles')!!}
                {!!Form::select('role', $select_roles, null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    {!! Form::submit('Aceptar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!!Form::close()!!}
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped table-hover top-margin-25">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Rol asignado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @foreach($user->roles as $role)
                        @if ($role->name != 'participant')
                        <tr>
                            <td>{{$user->name . ' ' . $user->last_name}}</td>
                            <td>{{$user->doc_id}}</td>
                            <td>
                                {{$role->display_name}}
                            </td>
                            <td>
                                <a href="{{ url('admin/participantes/' . $user->id . '/edit') }}">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/roles/role-detachment', $user, $role]])!!}
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endif
                    @endforeach
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
