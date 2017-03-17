@extends('adminko.app')


@section('content')




    <h1>Редактировать: {!! $objects->title !!}</h1>
    <hr>


    {!! Form::model( $objects, ['method'=>'PATCH', 'enctype'=>'multipart/form-data', 'action'=>['adminko\AdminObjectsController@update',  $type, $objects->id]]) !!}

    @include('adminko.objects.form', [$buttonText = 'Сохранить изменения'])

    {!! Form::close() !!}


    @include('errors.list')
@stop