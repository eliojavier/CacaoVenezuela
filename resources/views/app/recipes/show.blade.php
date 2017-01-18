@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 margin-top-40">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>{{$recipe->name}}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-borderless table-hover">
                        <tr>
                            <td><strong>Modalidad:</strong></td>
                            <td class="text-justify">{{$recipe->modality}}</td>
                        </tr>
                        <tr>
                            <td><strong>Ingredientes:</strong></td>
                            <td class="text-justify">{!!html_entity_decode($recipe->ingredients)!!}</td>
                        </tr>
                        <tr>
                            <td><strong>Preparación: </strong></td>
                            <td class="text-justify">{!!html_entity_decode($recipe->directions)!!}</td>
                        </tr>
                        <tr>
                            <td><strong>Raciones:</strong></td>
                            <td class="text-justify">{{$recipe->serves}}</td>
                        </tr>
                        @if ($recipe->image!=null)
                        <tr>
                            <td><strong>Imagen:</strong></td>
                            <td><img class="img-responsive" src="{{URL::asset($recipe->image)}}" alt=""></td>
                        </tr>
                        @endif
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
    </div>
@endsection
