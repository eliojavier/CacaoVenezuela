@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session()->has('flash_notification.message'))
                <div id="success-alert" class="alert alert-{{ session('flash_notification.level') }} alert-dismissible fade in text-center">
                    <strong> {!! session('flash_notification.message') !!} </strong>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Criterios</h2>
        </div>

        <div class="col-md-4 col-sm-12">
            <h3 class="page-header">Agregar criterio</h3>
            {!!Form::open(['url'=>'admin/criterios'])!!}
            @include('admin.criteria.form',['submitButtonText' => 'Agregar'])
            {!!Form::close()!!}
        </div>

        <div class="col-md-8 col-sm-12">
            <h3 class="page-header text-center">Listado de criterios</h3>
            <div class="table-responsive ">
                <table id="table" class="table table-bordered table-striped table-hover top-margin-25">
                    <thead>
                    <tr>
                        <th>Fase</th>
                        <th>Criterio</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($criteria as $criterion)
                        <tr>
                            <td>{{$criterion->phase}}</td>
                            <td>{{$criterion->criterion}}</td>
                            <td>
                                <a href="{{ url('admin/criterios/' . $criterion->id . '/edit') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => 'admin/criterios/' . $criterion->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
