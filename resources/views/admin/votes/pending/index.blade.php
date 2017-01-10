@extends('layouts.dashboard')

@section('content')
    @include('layouts.flash_message')

    <div class="col-lg-12">
        <h2 class="page-header">Votaciones pendientes</h2>
    </div>

    <div class="row margin-top-15">

            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Receta</th>
                            <th>Modalidad</th>
                            <th>Ver</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->name}}</td>
                            <td>{{$recipe->modality}}</td>
                            <td>
                                <a href="{{ url('admin/recetas/' . $recipe->id ) }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>

    {{--<div class="row">--}}
        {{--<div class="col-lg-4 col-lg-offset-4 col-sm-10">--}}
            {{--@include('admin.votes._pending')--}}
            {{--<div class="col-md-12 text-center">--}}
                {{--{{ $recipes->links() }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--{!!Form::open(['url'=>['admin/votaciones']])!!}--}}
    {{--{!!Form::hidden('recipe', $recipe->id)!!}--}}
    {{--@foreach($criteria as $criterion)--}}
        {{--<div class="form-group">--}}
            {{--{!!Form::label('criterion',$criterion->criterion)!!}--}}
            {{--{!!Form::select($criterion->id, $scores, null, ['class' => 'form-control'])!!}--}}
        {{--</div>--}}
    {{--@endforeach--}}
    {{--<div class="form-group text-center">--}}
        {{--{!!Form::submit('Votar', ['class' => 'btn btn-primary'])!!}--}}
    {{--</div>--}}
    {{--{!!Form::close()!!}--}}
@endsection