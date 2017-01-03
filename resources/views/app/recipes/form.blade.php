<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
</div>

<div class="form-group">
    {!! Form::label('modality', 'Modalidad')!!}
    {!! Form::select('modality', [''=>'Seleccione una modalidad...', 'Dulce' => 'Dulce', 'Salado' => 'Salado'], null, ['class'=>'form-control'])!!}
</div>

{{--<div class="form-group">--}}
    {{--{!!Form::label('quantity','Cantidad')!!}--}}
    {{--{!!Form::text('quantity', old('quantity'), ['class'=>'form-control', 'placeholder'=>'300 gramos, 1/2 kilo, 1 litro, etc.'])!!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('ingredients', 'Ingredientes')!!}--}}
    {{--{!! Form::text('ingredients', old('ingredients'), ['class'=>'form-control'])!!}--}}
{{--</div>--}}

<div class="form-group">
    {!!Form::label('ingredients','Ingredientes')!!}
    {!!Form::textarea('ingredients', old('ingredients'), ['class'=>'form-control', 'placeholder'=>'Ingredientes'])!!}
</div>

<div class="form-group">
    {!!Form::label('directions','Preparación')!!}
    {!!Form::textarea('directions', old('preparation'), ['class'=>'form-control', 'placeholder'=>'Preparación'])!!}
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
    {!! Form::label('tags', 'Escriba los ingredientes principales')!!}
    <ul id="myTags">

    </ul>
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    </div>
</div>

@section('after-script-end')
    <script>
        $(document).ready(function () {
            var availableTags = [];
            $('#ingredients').keydown(function () {
                $.ajax({
                    url: '../misrecetas/ingredients-by-keyword',
                    type: 'GET',
                    data: {val: $('#ingredients').val()},
                    success: function (result) {
                        availableTags = [];
                        $.each(result.ingredients, function (key, value) {
                            availableTags.push(value.name);
                        });
                        $("#ingredients").autocomplete({
                            source: availableTags
                        });
                    },
                    error: function () {
                        availableTags = [];
                    }
                })
            });

            $.ajax({
                url: '../misrecetas/all-ingredients',
                type: 'GET',
                success: function (result) {
                    tags = [];
                    $.each(result.ingredients, function (key, value) {
                        tags.push(value.name);
                    });
                    $("#myTags").tagit({
                        availableTags: tags,
                        fieldName: 'tags[]',
                        allowSpaces: true
                    });
                },
                error: function () {
                    tags = [];
                }
            });
        });
    </script>
@endsection