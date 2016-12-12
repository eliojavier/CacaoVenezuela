<div class="form-group">
    {!!Form::label('phase','Fase')!!}
    {!!Form::number('phase', old('phase'), ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('criterion','Criterio de evaluación')!!}
    {!!Form::text('criterion', old('criterion'), ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    </div>
</div>

