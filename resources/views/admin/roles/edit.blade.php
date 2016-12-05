@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Editar rol</h1>
    </div>
    <div class="col-md-4">
        {!! Form::model($role,['method' => 'PATCH', 'url' => 'admin/jueces/' . $role->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @include('admin.roles._form',['submitButtonText' => 'Editar'])
        {!!Form::close()!!}
    </div>
@endsection