@extends('layouts.app')

@section('title')
    {{$content[0]->meta_title}} / Агентство недвижимости в Крыму - Top-City
@stop

@section('description')
    {{$content[0]->meta_description}}
@stop

@section('keywords')
    {{$content[0]->meta_keywords}}
@stop

@section('content')
    <section id="content">

        <div class="container">
            <div class="row">
                {!! $content[0]->content !!}
            </div>
        </div>
    </section>

    @include('errors.list')
@stop