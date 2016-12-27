@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Editar juez</h1>
    </div>
    <div class="col-md-4">
        {!! Form::model($criterion,['method' => 'PATCH', 'url' => 'admin/criterios/' . $criterion->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @include('admin.criteria.form',['submitButtonText' => 'Editar'])
        {!!Form::close()!!}
    </div>
@endsection