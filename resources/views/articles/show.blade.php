@extends('layouts.app')

@section('title'){{$articles->meta_title}} / Агентство недвижимости в Крыму - Top-City @stop

@section('description'){{$articles->meta_description}}@stop

@section('keywords'){{$articles->meta_keywords}}@stop

@section('content')
    {{--<section id="content">--}}

    {{--<div class="container">--}}
    {{--<div class="row">--}}
    <h1>{{$articles->title}}</h1>
    @if($articles->preview_img != '')
        <img style="max-height: 200px" class="img-responsive" src="{{$articles->preview_img}}"
             alt="{{$articles->title}}">
    @endif
    {!! $articles->body !!}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    @include('errors.list')
@stop