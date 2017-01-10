@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Editar receta</h2>
        </div>
        <div class="col-md-4">
            {!! Form::model($recipe,['method' => 'PATCH', 'url' => ['admin/jueces', $recipe]]) !!}
                @include('app.recipes.form',['submitButtonText' => 'Editar'])
            {!!Form::close()!!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('misrecetas') }}">
                <button type="button" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>
@endsection