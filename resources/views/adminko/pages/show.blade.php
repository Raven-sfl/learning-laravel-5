@extends('adminko.app')

@section('title'){{$page->title}} / Агентство недвижимости в Крыму - Top-City @stop
@section('description'){{$page->description}} @stop
@section('keywords'){{$page->keywords}} @stop

@section('content')

    <article>
        <h1>{{$page->title}}</h1>
        <div class="body">{!! $page->body !!}</div>
    </article>
    <a href="{{$page->id}}/edit">Редактировать</a>
@stop