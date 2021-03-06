@extends('layouts.dashboard')

@section('content')
    <div class="col-md-11">
        <h2 class="page-header">Reportes - Clasificados fase {{$phase}}</h2>
    </div>
    <div class="margin-top-15">
        <div class="col-md-9 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">#Receta</th>
                        <th class="text-center">Receta</th>
                        <th class="text-center">Puntuación</th>
                        <th class="text-center">Factor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $num = 1; ?>
                    @foreach($classifieds as $v)
                        <tr>
                            <td class="text-center">{{$num}}</td>
                            <td class="text-center">{{$v->id}}</td>
                            <td><a href="{{ url('admin/recetas/' . $v->id) }}"> {{$v->name}} </a></td>
                            <td class="text-center">{{$v->score}}</td>
                            <td class="text-center">{{$v->factor}}</td>
                        </tr>
                        <?php $num++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
