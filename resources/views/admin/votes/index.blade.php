@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row margin-top-15">
            @foreach($recipes as $recipe)
            {!!Form::open(['url'=>['admin/votaciones', $recipe]])!!}
                {!!Form::hidden('recipe', $recipe->id)!!}
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
                            {{--<th>Editar</th>--}}
                            {{--<th>Borrar</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                                <td>{{$recipe->name}}</td>
                                <td>{{$recipe->modality}}</td>
                                <td>
                                    @foreach($recipe->ingredients as $ingredient)
                                        {{$ingredient->quantity . " " . $ingredient->name . '-'}}
                                    @endforeach
                                </td>
                                <td>{{$recipe->preparation}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                {{ $recipes->links() }}
            </div>
        </div>

        {!!Form::close()!!}
    </div>
@endsection