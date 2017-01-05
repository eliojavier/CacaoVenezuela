@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Criterios</h2>
        </div>
        <div class="col-md-4 col-sm-12">
            <h3 class="page-header">Editar criterio</h3>
            {!! Form::model($criterion,['method' => 'PATCH', 'url' => 'admin/criterios/' . $criterion->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
                @include('admin.criteria.form',['submitButtonText' => 'Editar'])
            {!! Form::close()!!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 text-center">
            <a href="{{ url('admin/criterios') }}">
                <button type="button" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>
@endsection