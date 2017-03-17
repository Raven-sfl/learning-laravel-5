@extends('adminko.app')


@section('content')

    <h1>Создать странцу:</h1>
    <hr>
    {!! Form::open(['enctype'=>'multipart/form-data', 'action'=>'adminko\AdminPagesController@index']) !!}

    @include('adminko.pages.form', [$buttonText = 'Создать страницу'])

    {!! Form::close() !!}


    @include('errors.list')
@stop