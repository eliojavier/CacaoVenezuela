@extends('layouts.app')

@section('content')
    @include('layouts.flash_message')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 margin-top-40">
            <div class="panel panel-primary">
                <div class="panel-heading">Cambiar contraseña</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'perfiles/updatePassword']) !!}
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                            {!! Form::label('current_password', 'Contraseña actual *') !!}
                            {!! Form::password('current_password', ['class' => 'form-control']) !!}
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                    <strong>{{ $errors->first('current_password') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                            {!! Form::label('new_password', 'Nueva contraseña *') !!}
                            {!! Form::password('new_password', ['class' => 'form-control']) !!}
                            @if ($errors->has('new_password'))
                                <span class="help-block">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('new_password_confirmation', 'Confirmar contraseña *') !!}
                            {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Cambiar contraseña
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
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $('#phone').mask('0000-000-00-00');
        $('#doc_id').mask('000000000');
    </script>
@endsection