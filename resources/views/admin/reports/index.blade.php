@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row margin-top-15">
            <div class="col-md-8 col-md-offset-1">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Rankig ingredientes</th>
                            <th>Criterio </th>
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
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/criterios/' . $criterion->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
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
