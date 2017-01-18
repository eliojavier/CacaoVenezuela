<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    {!!Form::label('name','Nombre *')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
</div>

<div class="form-group">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
    {!! Form::label('modality', 'Modalidad *')!!}
    @if($action == 'create')
        {!! Form::select('modality', ['Dulce' => 'Dulce', 'Salado' => 'Salado'], null, ['class'=>'form-control'])!!}
    @else
        {!! Form::select('modality', ['Dulce' => 'Dulce', 'Salado' => 'Salado'], null, ['class'=>'form-control', 'disabled'])!!}
    @endif
</div>

<div class="form-group {{ $errors->has('ingredients') ? ' has-error' : '' }}">
    <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
    {!!Form::label('ingredients','Ingredientes *')!!}
    {!!Form::textarea('ingredients', old('ingredients'), ['class'=>'form-control', 'placeholder'=>'Ingredientes', 'id'=>'sn_ingredients'])!!}
</div>

<div class="form-group {{ $errors->has('directions') ? ' has-error' : '' }}">
    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
    {!!Form::label('directions','Preparación *')!!}
    {!!Form::textarea('directions', old('preparation'), ['class'=>'form-control', 'placeholder'=>'Preparación', 'id'=>'sn_directions'])!!}
</div>

<div class="form-group">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
    {!! Form::label('tags', 'Agregue tags de ingredientes principales')!!}
    <ul id="myTags">

    </ul>
</div>

<div class="form-group {{ $errors->has('serves') ? ' has-error' : '' }}">
    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
    {!!Form::label('serves','Raciones *')!!}
    {!!Form::number('serves', old('serves'), ['class'=>'form-control', 'placeholder'=>'Raciones '])!!}
</div>

<div class="form-group">
    <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
    {!!Form::label('image','Imagen')!!}
    {!!Form::file('image', ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>

@if ($action=='create')
@section('after-scripts-end')
    <script>
        $(document).ready(function () {
            var availableTags = [];
            $.when(getAllIngredientsAjaxCall()).then(getIngredientsByKeywordAjaxCall);

            function getAllIngredientsAjaxCall() {
                return $.ajax({
                    url: '/misrecetas/all-ingredients',
                    type: 'GET',
                    success: function (result) {
                        tags = [];
                        $.each(result.ingredients, function (key, value) {
                            tags.push(value.name);
                        });
                        $("#myTags").tagit({
                            availableTags: tags,
                            fieldName: 'tags[]',
                            allowSpaces: false
                        });
                    },
                    error: function () {
                        tags = [];
                    }
                });
            }

            function getIngredientsByKeywordAjaxCall() {
                return $('#ingredients').keydown(function () {
                    $.ajax({
                        url: '/misrecetas/ingredients-by-keyword',
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
            }
        });

        $('#sn_ingredients').summernote({
            height:300,
        });

        $('#sn_directions').summernote({
            height:300,
        });
    </script>
@endsection

@else
@section('after-scripts-end')
    <script>
        $(document).ready(function () {
            var availableTags = [];

            $.when(getTagsAjaxCall(), getAllIngredientsAjaxCall()).then(getIngredientsByKeywordAjaxCall);

            function getTagsAjaxCall() {
                return $.ajax({
                    url: '/misrecetas/get-tags',
                    type: 'GET',
                    data: {
                        id: <?php
                            if (isset($recipe->id)) {
                                echo $recipe->id;
                            } else {
                                echo null;
                            }?>},
                        success: function (result) {
                            recipetags = [];
                            $.each(result.tags, function (key, value) {
                                $("#myTags").append('<li>' + value + '</li>');
                            });
                        },
                        error: function () {
                            recipetags = [];
                        }
                    });
            }

            function getAllIngredientsAjaxCall() {
                return $.ajax({
                    url: '/misrecetas/all-ingredients',
                    type: 'GET',
                    success: function (result) {
                        tags = [];
                        $.each(result.ingredients, function (key, value) {
                            tags.push(value.name);
                        });
                        $("#myTags").tagit({
                            availableTags: tags,
                            fieldName: 'tags[]',
                            allowSpaces: false
                        });
                    },
                    error: function () {
                        tags = [];
                    }
                });
            }

            function getIngredientsByKeywordAjaxCall() {
                return $('#ingredients').keydown(function () {
                    $.ajax({
                        url: '/misrecetas/ingredients-by-keyword',
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
            }
        });

        $('#sn_ingredients').summernote({
            height:300,
        });

        $('#sn_directions').summernote({
            height:300,
        });
    </script>
@endsection

@endif