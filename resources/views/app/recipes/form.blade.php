<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
</div>

<div class="form-group">
    {!! Form::label('modality', 'Modalidad')!!}
    {!! Form::select('modality', [''=>'Seleccione una modalidad...', 'Dulce' => 'Dulce', 'Salado' => 'Salado'], null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('quantity','Cantidad')!!}
    {!!Form::text('quantity', old('quantity'), ['class'=>'form-control', 'placeholder'=>'300 gramos, 1/2 kilo, 1 litro, etc.'])!!}
</div>

<div class="form-group">
    {!! Form::label('ingredients', 'Ingredientes')!!}
    {!! Form::select('ingredients', $ingredients, null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('preparation','Preparación')!!}
    {!!Form::textarea('preparation', old('preparation'), ['class'=>'form-control', 'placeholder'=>'Preparación'])!!}
</div>

<div class="form-group">
    {!!Form::label('serves','Raciones')!!}
    {!!Form::number('serves', old('serves'), ['class'=>'form-control', 'placeholder'=>'Raciones '])!!}
</div>

<div class="form-group">
    {!!Form::label('image','Imagen')!!}
    {!!Form::file('image')!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    </div>
</div>