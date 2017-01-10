<div class="form-group  {{ $errors->has('phase') ? ' has-error' : '' }}">
    {!!Form::label('phase','Fase *')!!}
    {!!Form::select('phase', ['1'=>'1', '2'=>'2'], null, ['class'=>'form-control'])!!}
</div>

<div class="form-group  {{ $errors->has('criterion') ? ' has-error' : '' }}">
    {!!Form::label('criterion','Criterio de evaluación *')!!}
    {!!Form::text('criterion', old('criterion'), ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>


