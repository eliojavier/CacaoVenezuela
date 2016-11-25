@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                {!!Form::open(['url'=>'admin/roles'])!!}
                    @include ('admin.roles._form')
                    <div class="form-group">
                        {!!Form::submit('Agregar', ['class'=>'btn btn-success'])!!}
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Nombre </th>
                            <th>Descripción </th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    <a href="{{ url('admin/criterios/' . $role->id . '/edit') }}">
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
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/criterios/' . $role->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
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
