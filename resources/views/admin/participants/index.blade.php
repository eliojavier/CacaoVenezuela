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

    <div class="col-md-11">
        <h2 class="page-header">Participantes</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-9 col-md-offset-1 col-sm-12">
            <h3 class="page-header text-center">Listado de participantes</h3>
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Cédula</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        {{--<th>Borrar</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participants as $participant)
                        <tr>
                            <td>{{$participant->name}}</td>
                            <td>{{$participant->last_name}}</td>
                            <td>{{$participant->email}}</td>
                            <td>{{$participant->doc_id}}</td>
                            <td>
                                <a href="{{ url('admin/participantes/' . $participant->id) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('admin/participantes/' . $participant->id . '/edit') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            {{--<td>--}}
                                {{--{!! Form::open(['method' => 'DELETE', 'url' => ['admin/participantes', $participant], 'class'=>'form-horizontal', 'role'=>'form']) !!}--}}
                                {{--<button type="submit" class="btn btn-success">--}}
                                    {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                                {{--</button>--}}
                                {{--{!!Form::close()!!}--}}
                            {{--</td>--}}
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
