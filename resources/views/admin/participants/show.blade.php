@extends('layouts.dashboard')

@section('content')
    <h2 class="page-header tex-center">Ficha participante</h2>
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-address-card" aria-hidden="true"></i>
                {{$participant->name}} {{$participant->last_name}}
            </div>
            <div class="panel-body">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{$participant->email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Doc. identidad:</strong></td>
                        <td>{{$participant->doc_id}}</td>
                    </tr>
                    <tr>
                        <td><strong>Teléfono: </strong></td>
                        <td>{{$participant->phone}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha Nacimiento:</strong></td>
                        <td>{{$participant->birthday->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td>{{$participant->city->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Twitter:</strong></td>
                        <td>{{$participant->twitter}}</td>
                    </tr>
                    <tr>
                        <td><strong>Instagram:</strong></td>
                        <td>{{$participant->instagram}}</td>
                    </tr>
                    <tr>
                        <td><strong>Talla:</strong></td>
                        <td>{{$participant->size}}</td>
                    </tr>
                    <tr>
                        <td><strong>Categoría:</strong></td>
                        <td>{{$participant->category}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo:</strong></td>
                        <td>{{@$participant->type ?: '-'}}</td>
                    </tr>
                    <tr>
                        <td><strong>Academia:</strong></td>
                        <td>{{@$participant->academy->name ?: '-'}}</td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <a href="{{ URL::previous() }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection