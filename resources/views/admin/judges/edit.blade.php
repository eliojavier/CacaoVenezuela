@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Editar juez</h2>
        </div>
        <div class="col-md-3">
            {!! Form::model($judge,['method' => 'PATCH', 'url' => ['admin/jueces', $judge], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                @include('admin.judges.form',['submitButtonText' => 'Editar'])
            {!!Form::close()!!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>
@endsection