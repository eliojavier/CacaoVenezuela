@extends('layouts.dashboard')

@section('content')
    <div class="se-pre-con"></div>
    <div class="col-md-11">
        <h2 class="page-header">Reportes - Recetas votadas</h2>
    </div>
    <div class="margin-top-15">
        <div class="col-md-8 col-md-offset-1">
            <div class="table-responsive">
                <table id="recipes_voted" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Juez</th>
                        <th class="text-center">Receta</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes_voted as $v)
                        <tr>
                            <td class="text-center">{{$v->judge}}</td>
                            <td class="text-center">{{$v->recipe}}</td>
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