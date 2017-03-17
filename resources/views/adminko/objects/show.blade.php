@extends('adminko.app')

@section('title'){{$article->title}} / Агентство недвижимости в Крыму - Top-City @stop
@section('description'){{$article->description}} @stop
@section('keywords'){{$article->keywords}} @stop

@section('content')

    <article>
        <h1>{{$article->title}}</h1>
        <div class="body">{!! $article->body !!}</div>
    </article>
    <a href="{{$article->id}}/edit">Редактировать</a>
@stop