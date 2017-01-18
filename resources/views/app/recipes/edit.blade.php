@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 margin-top-40">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar receta</div>
                <div class="panel-body">
                    {!! Form::model($recipe,['method' => 'PATCH', 'url' => 'misrecetas/' . $recipe->id, 'files'=>true]) !!}
                        @include('app.recipes.form',['submitButtonText' => 'Editar', 'action'=>'edit'])
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection