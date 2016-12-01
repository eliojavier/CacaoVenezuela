@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <a href="{{ url('admin/criterios/create') }}">
                    <button type="button" class="btn btn-primary">
                        Agregar criterio
                    </button>
                </a>
            </div>
         </div>
        <div class="row margin-top-15">
            <div class="col-md-8 col-md-offset-1">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Fase</th>
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
                                        <button type="button" class="btn btn-default">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/criterios', $criterion], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                        {!!Form::submit('Eliminar', ['class'=>'btn btn-default'])!!}
                                    {!!Form::close()!!}
                                    {{--<a href="{{ $url = action('CriterionController@destroy', ['criterion'=>$criterion]) }}">--}}
                                        {{--<button type="button" class="btn btn-default">--}}
                                            {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
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
