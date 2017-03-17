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


    @if($type == 'houses')<h1>Дома</h1>
    @elseif($type == 'flats')<h1>Квартиры</h1>
    @elseif($type == 'new-buildings')<h1>Новостройки</h1>
    @elseif($type == 'commercial')<h1>Коммерческие</h1>
    @elseif($type == 'areas')<h1>Участки</h1>
    @endif
    {{--<div class=" margin-bottom-40">--}}

    {{--<form action="/{{URL::current()}}" method="GET" class="form-inline" role="form">--}}
    {{--                    {!! Form::open(['enctype'=>'multipart/form-data'] ,compact($type), ['action'=>Request::path()]) !!}--}}
    {{--<div class="col-md-12">--}}
    {{--<p class="pull-left hidden-xs"> {{$sort}}Сортировать по: </p><p style="color: #0b0b0b">--}}
    {{--<label class="ruble"><input type="radio" name="setsort" value="date" onclick="setSort('date')" @if($sort== 'date') checked @endif>Дате</label>--}}
    {{--<label class="dollar"><input type="radio" name="setsort" value="priceUp" onclick="setSort('priceUp')"@if($sort== 'priceUp') checked @endif/>По возрастанию цены</label>--}}
    {{--<label class="euro"><input type="radio" name="setsort" value="priceDown" onclick="setSort('priceDown')"@if($sort== 'priceDown') checked @endif/>По убыванию цены</label>--}}
    {{--{!! Form::submit('отправить', ['class'=>'btn btn-primary form-control' ]) !!}--}}
    {{--</div>--}}
    {{--                    {!! Form::close() !!}--}}
    {{--</form>--}}

    <div class="col-md-12">
        <p class="pull-left hidden-xs"> Сортировать по:&nbsp</p>
        <FORM NAME="radioLinks">
            <INPUT TYPE="radio" NAME="pickme" id="NBC" onClick="radioLink('date')" @if($sort == 'date') checked @endif>
            Дате
            <INPUT TYPE="radio" NAME="pickme" id="NBC" onClick="radioLink('priceUp')"
                   @if($sort == 'priceUp') checked @endif> По возрастанию цены
            <INPUT TYPE="radio" NAME="pickme" id="NBC" onClick="radioLink('priceDown')"
                   @if($sort == 'priceDown')checked @endif> По убыванию цены
        </FORM>

    </div>



    @foreach($objects as $object)
        <div class=" row service-v1 col-md-10 md-margin-bottom-40">
            @if( isset($object->gallery))
                <div class="col-md-4">
                    <a href="/objects/{{$object->type}}/{{$object->base_id}}"><img style="max-height: 200px"
                                                                                   class="img-responsive"
                                                                                   src="{{$object->gallery[0]->gallery_img}}"
                                                                                   alt="{{$object->gallery[0]->gallery_alt}}"></a>
                </div>
            @endif
            <div class="col-md-8">
                <a href="/objects/{{$object->type}}/{{$object->base_id}}"><h3
                            style="margin-top: 0px;">{{$object->title}}</h3></a>
                <p>Адрес: {!! $object->address !!}</p>
                <p>Цена: <b>{{ number_format($object->price, 0, '.', ' ') }}</b>
                    @if($object->currency == 2)
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    @elseif($object->currency == 1)
                        <i class="fa fa-rub" aria-hidden="true"></i>
                    @elseif($object->currency == 3)
                        <i class="fa fa-eur" aria-hidden="true"></i>
                    @endif</p>
                <p>Дата: {{date_format($object->created_at, 'd.m.Y')}}</p>
                <a href="/objects/{{$object->type}}/{{$object->base_id}}">Подробнее</a>
                <hr>
            </div>
        </div>

    @endforeach
    <div class="col-md-12">{{$links}}</div>


    @include('errors.list')
@stop
