@extends('layouts.dashboard')

@section('content')
    @include('layouts.flash_message')

    <div class="col-md-11">
        <h2 class="page-header">Participantes</h2>
    </div>

    <div class="row">
        <div class="col-md-9 col-md-offset-1 col-sm-12">
            <h3 class="page-header text-center">Listado de participantes</h3>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-hover">
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