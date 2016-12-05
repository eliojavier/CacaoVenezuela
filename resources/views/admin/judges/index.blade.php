@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if (session()->has('flash_notification.message'))
            <div id="success-alert" class="alert alert-{{ session('flash_notification.level') }} alert-dismissible fade in text-center">
                <strong> {!! session('flash_notification.message') !!} </strong>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <h1 class="page-header">Jueces</h1>
    </div>

    <div class="col-md-4 col-sm-12">
        {!!Form::open(['url'=>'admin/jueces'])!!}
            @include('admin.judges._form',['submitButtonText' => 'Agregar'])
        {!!Form::close()!!}
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($judges as $judge)
                        <tr>
                            <td>{{$judge->name}}</td>
                            <td>{{$judge->email}}</td>
                            <td>{{$judge->phone}}</td>
                            <td>
                                <a href="{{ url('admin/jueces/' . $judge->id . '/edit') }}">
                                    <button type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/jueces', $judge], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    </script>
@endsection
