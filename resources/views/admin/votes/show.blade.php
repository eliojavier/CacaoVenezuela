@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <h2 class="page-header">Votar receta</h2>
    </div>

    <div class="row margin-top-15">
        {!!Form::open(['url'=>['admin/votaciones', $recipe]])!!}
        <div class="col-md-11">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Receta</th>
                        <th>Modalidad</th>
                        <th>Ingredientes</th>
                        <th>Preparación</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$recipe->user->name . " " . $recipe->user->last_name}}</td>
                        <td>{{$recipe->name}}</td>
                        <td>{{$recipe->modality}}</td>
                        <td>{{$recipe->ingredients}}</td>
                        <td>{{$recipe->directions}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                @foreach($criteria as $criterion)
                    <div class="form-group">
                        {!!Form::label('criterion', $criterion->criterion)!!}
                        {!!Form::select($criterion->criterion, $scores, null, ['class' => 'form-control'])!!}
                    </div>
                @endforeach
                {!!Form::open(['url'=>['admin/votaciones', $recipe]])!!}
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">
                        Votar
                    </button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
@endsection

