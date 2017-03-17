@extends('layouts.app')

{{--@section('title')--}}
{{--{{$articles->meta_title}} / Агентство недвижимости в Крыму - Top-City--}}
{{--@stop--}}

{{--@section('description')--}}
{{--{{$articles->meta_description}}--}}
{{--@stop--}}

{{--@section('keywords')--}}
{{--{{$articles->meta_keywords}}--}}
{{--@stop--}}

@section('content')

    <h1>Резутьтат поиска:</h1>
    @if(isset($objects[0]))
        @foreach($objects as $object)
            <div class=" row service-v1 col-md-9 md-margin-bottom-40">
                @if( isset($object->gallery))
                    <a href="/objects/{{$object->type}}/{{$object->base_id}}"><img style="max-height: 200px"
                                                                                   class="img-responsive"
                                                                                   src="{{$object->gallery[0]->gallery_img}}"
                                                                                   alt="{{$object->gallery[0]->gallery_alt}}"></a>
                @endif
                <a href="/objects/{{$object->type}}/{{$object->base_id}}"><h3>{{$object->title}}</h3></a>
                <p>Адрес: {!! $object->address !!}</p>
                <a href="/objects/{{$object->type}}/{{$object->base_id}}">Подробнее</a>
                <hr>
            </div>
        @endforeach
    @else()
        <p>Объект с ID <b>{{$id}}</b> не найден. Проверьте правильность ввода ID и повторите поиск или воспользуйтесь
            поиском объектов.</p>
    @endif


    @include('errors.list')
@stop
