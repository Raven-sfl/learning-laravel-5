@extends('adminko.app')


@section('content')

    <h1>Написать новую статью:</h1>
    <hr>
    {!! Form::open(['enctype'=>'multipart/form-data', 'action'=>'adminko\AdminArticlesController@index']) !!}

    @include('adminko.articles.form', [$buttonText = 'Создать статью'])

    {!! Form::close() !!}


    @include('errors.list')
@stop