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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                                <td>{{$recipe->name}}</td>
                                <td>{{$recipe->modality}}</td>
                                <td>
                                    {{$recipe->ingredients}}
                                </td>
                                <td>{{$recipe->directions}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        @include('admin.votes._pending')
        <div class="col-md-6 col-md-offset-4">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection