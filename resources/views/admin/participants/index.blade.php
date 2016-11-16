@extends('layouts.dashboard')

@section('content')
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-1">--}}
                {{--<a href="{{ url('admin/jueces/create') }}">--}}
                    {{--<button type="button" class="btn btn-primary">--}}
                        {{--Agregar juez--}}
                    {{--</button>--}}
                {{--</a>--}}
            {{--</div>--}}
         {{--</div>--}}
        <div class="row margin-top-15">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Cédula</th>
                            <th>Editar</th>
                            <th>Borrar</th>
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
                                    <a href="{{ url('admin/participantes/' . $participant->id . '/edit') }}">
                                        <button type="button" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-edit"></span>Editar
                                        </button>
                                    </a>
                                    {{--<button type="button" id="edit" data-toggle="modal" data-target="#editar-juez" class="btn btn-warning">--}}
                                        {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" data-toggle="modal" data-target="#eliminar-juez" class="btn btn-danger">--}}
                                        {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                    {{--</button>--}}
                                </td>
                                <td>
                                    {{--<a href="{{ url('admin/jueces/' . $judge->id . '/edit') }}">--}}
                                        {{--<button type="button" class="btn btn-danger">--}}
                                            {{--<span class="glyphicon glyphicon-edit"></span>Eliminar--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/participantes/' . $participant->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                        {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
{{--@section('scripts')--}}
    {{--<script>--}}
        {{--$(document).on("click", "#edit", function () {--}}
            {{--var row = $(this).closest('tr').attr('id');--}}
            {{--$(".modal-body #id").val(row);--}}
        {{--});--}}
    {{--</script>--}}

{{--@endsection--}}
