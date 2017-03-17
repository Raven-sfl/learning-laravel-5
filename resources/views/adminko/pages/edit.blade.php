@extends('adminko.app')


@section('content')

    <h1>Редактировать страницу: {!! $pages->title !!}</h1>
    <hr>
    {!! Form::model($pages, ['method'=>'PATCH', 'enctype'=>'multipart/form-data', 'action'=>['adminko\AdminPagesController@update', $pages->id]]) !!}

    @include('adminko.pages.form', [$buttonText = 'Сохранить изменения'])

    {!! Form::close() !!}


    @include('errors.list')
@stop