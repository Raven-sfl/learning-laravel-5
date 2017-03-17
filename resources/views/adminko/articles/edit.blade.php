@extends('adminko.app')


@section('content')

    <h1>Редактировать: {!! $articles->title !!}</h1>
    <hr>
    {!! Form::model($articles, ['method'=>'PATCH', 'enctype'=>'multipart/form-data', 'action'=>['adminko\AdminArticlesController@update', $articles->id]]) !!}

    @include('adminko.articles.form', [$buttonText = 'Сохранить изменения'])

    {!! Form::close() !!}


    @include('errors.list')
@stop