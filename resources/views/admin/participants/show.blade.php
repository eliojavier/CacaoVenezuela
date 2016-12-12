@extends('layouts.dashboard')

@section('content')
    <h1 class="page-header tex-center">Detalle participante</h1>
    <div class="col-md-6 col-md-offset-3">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">
                <colgroup>
                    <col class="col-md-2">
                    <col class="col-md-2">
                </colgroup>
                <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{$participant->name}}</td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td>{{$participant->last_name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$participant->email}}</td>
                </tr>
                <tr>
                    <th>Cédula</th>
                    <td>{{$participant->doc_id}}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{$participant->phone}}</td>
                </tr>
                <tr>
                    <th>Fecha Nacimiento</th>
                    <td>{{$participant->birthday}}</td>
                </tr>
                <tr>
                    <th>Academia</th>
                    <td>{{$participant->academy->name}}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>{{$participant->city->name}}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{$participant->address}}</td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td>{{$participant->twitter}}</td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>{{$participant->instagram}}</td>
                </tr>
                <tr>
                    <th>Talla</th>
                    <td>{{$participant->size}}</td>
                </tr>
                <tr>
                    <th>Categoría</th>
                    <td>{{$participant->category}}</td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td>{{$participant->type}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ url('admin/participantes') }}">
            <button type="button" class="btn btn-default">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
            </button>
        </a>
    </div>

@endsection