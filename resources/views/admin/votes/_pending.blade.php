<div class="row">
    <div class="col-md-4">
        {!!Form::open(['url'=>['admin/votaciones', $recipe]])!!}
        {!!Form::hidden('recipe', $recipe->id)!!}
        @foreach($criteria as $criterion)
            <div class="form-group">
                {!!Form::label('criterion',$criterion->criterion)!!}
                {!!Form::select($criterion->id, $scores, null, ['class' => 'form-control'])!!}
            </div>
        @endforeach
        <div class="form-group">
            {!!Form::submit('Votar', ['class' => 'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </div>
</div>