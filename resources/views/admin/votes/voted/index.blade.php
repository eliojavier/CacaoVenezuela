@extends('layouts.dashboard')

@section('content')
    <div class="se-pre-con"></div>
    <div class="col-md-11">
        <h2 class="page-header">Votaciones realizadas</h2>
    </div>

    <div class="row margin-top-15">
        <div class="col-md-9 col-md-offset-1">
            <div class="table-responsive">
                <table id="recipes_voted" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ingredientes</th>
                        <th>Preparación</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                {{$recipe->ingredients}}
                            </td>
                            <td>{{$recipe->directions}}</td>
                            <td>
                                <a href="{{ url('admin/votaciones/realizadas/' . $recipe->id) }}">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-1 text-center">
                <a href="{{ URL::previous() }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $('#recipes_voted').DataTable({
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