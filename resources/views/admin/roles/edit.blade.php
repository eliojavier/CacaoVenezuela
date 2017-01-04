@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Editar rol</h2>
    </div>
    <div class="col-md-4">
        {!! Form::model($role,['method' => 'PATCH', 'url' => ['admin/roles', $role], 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @include('admin.roles.form',['submitButtonText' => 'Editar'])
        {!!Form::close()!!}
    </div>
@endsection