@extends('layouts.dashboard')

@section('content')
    <div class="se-pre-con"></div>
    @include('layouts.flash_message')
    <div class="col-md-11">
        <h2 class="page-header">Recetas</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-9 col-md-offset-1 col-sm-12">
            <h3 class="page-header text-center">Listado de recetas</h3>
            <div class="table-responsive">
                <table id="recipes" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Participante</th>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ver</th>
                        @if(Auth::user()->hasRole('super_admin'))
                            <th>Borrar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                <a href="{{ url('admin/recetas/' . $recipe->id) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            @if(Auth::user()->hasRole('super_admin'))
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/recetas', $recipe]]) !!}
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                {!!Form::close()!!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-md-offset-1 col-sm-12">
            <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                </button>
            </a>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $('#recipes').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Ningún registro encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Ningún registro disponible",
                "infoFiltered": "(filtered from _MAX_ total records)",
                paginate: {
                    first:      "Primer",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                }
            }
        });
    </script>
@endsection

