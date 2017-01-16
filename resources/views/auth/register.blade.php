@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de usuarios</div>
                    <div class="panel-body">
                        {!!Form::open(['url'=>'register', 'role'=>'form', 'class'=>'form-horizontal'])!!}

                            @include('auth.form')

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                {!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


