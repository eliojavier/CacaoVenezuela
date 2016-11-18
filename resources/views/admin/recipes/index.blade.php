@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row margin-top-15">
            @foreach($recipes as $recipe)
            <div class="col-md-8 col-md-offset-1">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Receta </th>
                            <th>Modalidad </th>
                            <th>Ingredientes</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                                <td>{{$recipe->name}}</td>
                                <td>{{$recipe->modality}}</td>
                                <td>
                                    @foreach($recipe->ingredients as $ingredient)
                                        {{$ingredient->name . " - "}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('admin/recetas/' . $recipe->id . '/edit') }}">
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
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/recetas/' . $recipe->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                    {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
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
