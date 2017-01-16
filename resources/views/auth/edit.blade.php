@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Editar perfil</h2>
        </div>
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($user,['method' => 'PATCH', 'url' => ['perfiles', $user], 'class'=>'form-horizontal', 'role'=>'form']) !!}
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=>'Nombre', 'autofocus']) !!}
                    </div>
                    <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {!! Form::label('last_name', 'Apellido')!!}
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder'=>'Apellido']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Teléfono') !!}
                        {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder'=> 'xxxx-xxx-xx-xx']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('twitter') ? ' has-error' : '' }}">
                        {!! Form::label('twitter', 'Twitter') !!}
                        {!! Form::text('twitter', old('twitter'), ['class' => 'form-control', 'placeholder'=> 'Twitter']) !!}
                    </div>

                    <div class="col-md-6 {{ $errors->has('instagram') ? ' has-error' : '' }}">
                        {!! Form::label('instagram', 'Instagram') !!}
                        {!! Form::text('instagram', old('instagram'), ['class' => 'form-control', 'placeholder'=> 'Instagram']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('current_password') ? ' has-error' : '' }}">
                        {!! Form::label('current_password', 'Contraseña actual') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-6 {{ $errors->has('instagram') ? ' has-error' : '' }}">
                        {!! Form::label('instagram', 'Instagram') !!}
                        {!! Form::text('instagram', old('instagram'), ['class' => 'form-control', 'placeholder'=> 'Instagram']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Editar
                    </button>
                </div>
            </div>

            <div class="col-md-12">
                <a href="{{ URL::previous() }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                    </button>
                </a>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $('#phone').mask('0000-000-00-00');
        $('#doc_id').mask('000000000');
    </script>
@endsection