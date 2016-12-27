@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Editar juez</h1>
    </div>
    <div class="col-md-4">
        {!! Form::model($judge,['method' => 'PATCH', 'url' => 'admin/jueces/' . $judge->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @include('admin.judges.form',['submitButtonText' => 'Editar'])
        {!!Form::close()!!}
    </div>
@endsection