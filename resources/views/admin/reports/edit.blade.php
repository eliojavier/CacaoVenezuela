@extends('layouts.dashboard')

@section('content')
    {!! Form::model($criterion,['method' => 'PATCH', 'url' => 'admin/criterios/' . $criterion->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('admin.criteria._form')
        <div class="form-group">
            {!!Form::submit('Editar', ['class'=>'btn btn-success'])!!}
        </div>
    {!!Form::close()!!}
@endsection