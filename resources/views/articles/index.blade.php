@extends('layouts.app')

{{--@section('title')--}}
{{--{{$articles->meta_title}} / Агентство недвижимости в Крыму - Top-City--}}
{{--@stop--}}

{{--@section('description')--}}
{{--{{$articles->meta_description}}--}}
{{--@stop--}}

{{--@section('keywords')--}}
{{--{{$articles->meta_keywords}}--}}
{{--@stop--}}

@section('content')


    <h1>Статьи</h1>
    {{--<div class="row service-v1 margin-bottom-40">--}}
    @foreach($articles as $article)
        <div class="row service-v1 col-md-6 md-margin-bottom-40">
            @if($article->preview_img != '')
                <a href="{{action('frontend\ArticlesController@show', $article->id)}}"><img style="max-height: 200px"
                                                                                            class="img-responsive"
                                                                                            src="{{$article->preview_img}}"
                                                                                            alt="{{$article->title}}"></a>
            @endif
            <a href="{{action('frontend\ArticlesController@show', $article->id)}}"><h3>{{$article->title}}</h3></a>
            <p>{!! $article->excerpt !!}</p>
            <a href="{{action('frontend\ArticlesController@show', $article->id)}}">Читать</a>
            <hr>
        </div>
        {{--</div>--}}
    @endforeach



    @include('errors.list')
@stop
