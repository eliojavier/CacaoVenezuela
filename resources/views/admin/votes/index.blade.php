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
                            <th>Preparación</th>
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
                                <td>{{$recipe->preparation}}</td>
                                <td>
                                    <a href="{{ url('admin/recetas/' . $recipe->id . '/edit') }}">
                                        <button type="button" class="btn btn-primary">
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
                                    {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                    {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'admin/recetas/' . $recipe->id, 'class'=>'form-horizontal', 'role'=>'form']) !!}
                                        {!!Form::button('Eliminar', ['type'=>'button', 'class'=>'btn btn-primary'])!!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
        @foreach($criteria as $criterion)
            <div class="info">
                {{$criterion->criterion}}
                1,2,3,4,5,6,7,8,9,10
            </div>

        @endforeach
        {{ $recipes->links() }}
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
