@extends('adminko.app')


@section('content')
    <h1>Редактирование объектов</h1>
    @if(!empty($type))
        <a href="/adminko/objects/{{$type}}/create">
            <button class="btn btn-primary form-control">Добавить объект</button>
        </a>
    @else
        <a href="/adminko/objects/houses/create">
            <button class="btn btn-primary ">Добавить дом</button>
        </a>
        <a href="/adminko/objects/areas/create">
            <button class="btn btn-primary ">Добавить участок</button>
        </a>
        <a href="/adminko/objects/new-buildings/create">
            <button class="btn btn-primary ">Добавить новостройку</button>
        </a>
        <a href="/adminko/objects/commercial/create">
            <button class="btn btn-primary ">Добавить коммерческую</button>
        </a>
        <a href="/adminko/objects/flats/create">
            <button class="btn btn-primary ">Добавить квартиру</button>
        </a>
    @endif
    <hr>
    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <td style="width: 5%">ID</td>
            <td style="width: 5%">ID объекта</td>
            <td style="width: 45%">Название</td>
            <td style="width: 45%">Адрес</td>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
        </tr>
        </thead>
        <tbody>
        @if(! empty($objects))
            @foreach($objects as $object)
                <tr>
                    <td>{{$object->id}}</td>
                    <td>{{$object->base_id}}</td>
                    <td style="font-weight: 400">{{$object->title}}</td>
                    <td style="font-weight: 400">{{$object->address}}</td>
                    <td>
                        <a href="{{action('adminko\AdminObjectsController@edit', ['type'=>$object->type, 'id'=>$object->id])}}">
                            <button class="btn btn-primary form-control">Редактировать</button>
                        </a></td>
                    <td>
                        {!! Form::model($object, ['method'=>'DELETE','action'=>['adminko\AdminObjectsController@destroy', $object->type, $object->id]]) !!}
                        {!! Form::submit('Удалить', ['class'=>'btn btn-primary form-control' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop

