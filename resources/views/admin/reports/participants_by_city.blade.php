@extends('layouts.dashboard')

@section('content')
    <div class="margin-top-15">
        <div class="col-md-8 col-md-offset-1">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Estado</th>
                        <th class="text-center"># Participantes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($number_of_participants_by_city as $v)
                        <tr>
                            <td class="text-center">{{$v->ciudad}}</td>
                            <td class="text-center">{{$v->participantes}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
