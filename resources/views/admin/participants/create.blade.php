@extends('layouts.dashboard')

@section('content')
    {!!Form::open(['url'=>'admin/jueces'])!!}
        @include('admin.judges._form')
        <div class="form-group">
            {!!Form::submit('Agregar', ['class'=>'btn btn-success'])!!}
        </div>
    {!!Form::close()!!}
@endsection