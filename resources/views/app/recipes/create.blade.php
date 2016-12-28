@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url' => 'misrecetas', 'files'=>true]) !!}
            @include('app.recipes.form', ['submitButtonText' => 'Inscribir'])
        {!! Form::close() !!}
    </div>
@endsection



                        {{--$.each(result.posts.data, function(key, value){--}}
                            {{--console.log(value.media.thumbnail_path);--}}
                            {{--console.log(value.media.display_name);--}}
                            {{--console.log(value.category.style);--}}
                            {{--console.log(value.category.display_name);--}}
                            {{--console.log(value.title);--}}
                            {{--console.log(value.published_date);--}}

                            {{--var slug = value.slug;--}}
                            {{--var thumbnail_path = value.media.thumbnail_path;--}}
                            {{--var m_display_name = value.media.display_name;--}}
                            {{--var category_style = value.category.style;--}}
                            {{--var c_display_name = value.category.display_name;--}}
                            {{--var title = value.title;--}}
                            {{--var published_date = value.published_date.date.toString();--}}

                            {{--$('#posts').append('<article class="col s12 m4">' +--}}
                                    {{--'<div>' +--}}
                                    {{--'<a href="/posts/' + slug + '">' +--}}
                                    {{--'<img class="responsive-img" src="/' + thumbnail_path + '" alt="' + m_display_name +'">' +--}}
                                    {{--'</a>' +--}}
                                    {{--'</div>' +--}}
                                    {{--'<p class="category-' + category_style + '">' + c_display_name + '</p>' +--}}
                                    {{--'<a href="/posts/' + slug + '">' +--}}
                                    {{--'<h3 class="post-title left-align">' + title + '</h3>' +--}}
                                    {{--'</a>' +--}}
                                    {{--'<p class="left-align  post-date">' + published_date + '</p>' +--}}
                                    {{--'</article>');--}}

                            {{--<article class="col s12 m4">--}}
                            {{--<div>--}}
                            {{--<a  href="{{ route('posts.show',$post) }}">--}}
                            {{--<img class="responsive-img" src="/{{$post->media->thumbnail_path}}" alt=" {{ $post->media->display_name }}">--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--<p class="category-{{$post->category->style}}">{{$post->category->display_name}}</p>--}}
                            {{--<a  href="{{ route('posts.show',$post) }}">--}}
                            {{--<h3 class="post-title left-align">--}}
                            {{--{{ $post->title }}--}}
                            {{--</h3>--}}
                            {{--</a>--}}
                            {{--<p class="left-align  post-date"> {{ $post->published_date->toFormattedDateString() }}</p>--}}
                            {{--</article>--}}

                        {{--});--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}

