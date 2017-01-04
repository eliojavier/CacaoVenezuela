@extends('layouts.dashboard')

@section('content')
    <div class="col-md-11">
        <h2 class="page-header">Reportes - Ranking ingredientes</h2>
    </div>
    <div class="margin-top-15">
        <div class="col-md-8 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Ingrediente</th>
                        <th class="text-center"># Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ingredients_most_used as $v)
                        <tr>
                            <td class="text-center">{{$v->ingrediente}}</td>
                            <td class="text-center">{{$v->usos}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection