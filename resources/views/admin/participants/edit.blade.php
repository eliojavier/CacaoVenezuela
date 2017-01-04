@extends('layouts.dashboard')

@section('content')
    <h2 class="page-header tex-center">Editar participante</h2>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('admin/participantes/') }}">
                <button type="button" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>

    {!! Form::model($participant,['method' => 'PATCH', 'url' => 'admin/participantes/' . $participant->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('admin.participants._form')
        <div class="row">
            <div class="col-md-4 col-md-offset-5">
                {!!Form::submit('Editar', ['class'=>'btn btn-success'])!!}
            </div>
        </div>

    {!!Form::close()!!}
@endsection