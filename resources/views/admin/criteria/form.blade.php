<div class="form-group">
    {!!Form::label('phase','Fase *')!!}
    {!!Form::select('phase', ['1'=>'1', '2'=>'2'], null, ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('criterion','Criterio de evaluación *')!!}
    {!!Form::text('criterion', old('criterion'), ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>


