@extends('adminko.app')


@section('content')

    <h1>Добавить объект</h1>
    <hr>

    {!! Form::open(['enctype'=>'multipart/form-data'] ,compact($type), ['action'=>'http://lara.loc/adminko/objects/']) !!}

    @include('adminko.objects.form', [$buttonText = 'Создать объект'])

    {!! Form::close() !!}


    @include('errors.list')
@stop