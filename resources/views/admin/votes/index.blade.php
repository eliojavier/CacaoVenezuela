@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if (session()->has('flash_notification.message'))
            <div id="success-alert" class="alert alert-{{ session('flash_notification.level') }} alert-dismissible fade in text-center">
                <strong> {!! session('flash_notification.message') !!} </strong>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <h2 class="page-header">Votaciones pendientes</h2>
    </div>

    <div class="row margin-top-15">
        @foreach($recipes as $recipe)
            <div class="col-md-8 col-md-offset-2">
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

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-sm-10">
            @include('admin.votes._pending')
            <div class="col-md-12 text-center">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    </script>
@endsection