@extends('layouts.app')

@section('content')
    <h2 class="page-header tex-center">Mi perfil</h2>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-address-card" aria-hidden="true"></i>
                {{$user->name}} {{$user->last_name}}
            </div>
            <div class="panel-body">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Doc. identidad:</strong></td>
                        <td>{{$user->doc_id}}</td>
                    </tr>
                    <tr>
                        <td><strong>Teléfono: </strong></td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha Nacimiento:</strong></td>
                        <td>{{$user->birthday->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td>{{$user->city->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Twitter:</strong></td>
                        <td>{{$user->twitter}}</td>
                    </tr>
                    <tr>
                        <td><strong>Instagram:</strong></td>
                        <td>{{$user->instagram}}</td>
                    </tr>
                    <tr>
                        <td><strong>Talla:</strong></td>
                        <td>{{$user->size}}</td>
                    </tr>
                    <tr>
                        <td><strong>Categoría:</strong></td>
                        <td>{{$user->category}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo:</strong></td>
                        <td>{{@$user->type ?: '-'}}</td>
                    </tr>
                    <tr>
                        <td><strong>Academia:</strong></td>
                        <td>{{@$user->academy->name ?: '-'}}</td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <a href="{{ URL::previous() }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Volver
                    </button>
                </a>
                <a href="{{ url('perfiles/' . $user->id . '/edit') }}">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Editar perfil
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection