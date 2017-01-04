<div class="row">
    <div class="col-md-4 col-md-offset-3">
        {!!Form::open(['url'=>['admin/votaciones', $recipe]])!!}
        {!!Form::hidden('recipe', $recipe->id)!!}
        @foreach($criteria as $criterion)
            <div class="form-group">
                {!!Form::label('criterion',$criterion->criterion)!!}
                {!!Form::select($criterion->id, $scores, null, ['class' => 'form-control'])!!}
            </div>
        @endforeach
        <div class="form-group text-center">
            {!!Form::submit('Votar', ['class' => 'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </div>
</div>