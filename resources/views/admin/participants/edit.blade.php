@extends('layouts.dashboard')

@section('content')
    {!! Form::model($judge,['method' => 'PATCH', 'url' => 'admin/jueces/' . $judge->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('admin.judges._form')
        <div class="form-group">
            {!!Form::submit('Editar', ['class'=>'btn btn-success'])!!}
        </div>
    {!!Form::close()!!}
@endsection