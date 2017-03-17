@extends('layouts.app')

@section('title')@if($objects[0]->meta_title !=''){{$objects[0]->meta_title}} @else {{$objects[0]->title}} @endif / Агентство недвижимости в Крыму - Top-City @stop

@section('description'){{$objects[0]->meta_description}}@stop

@section('keywords'){{$objects[0]->meta_keywords}}@stop

@section('content')

    <h1>{{$objects[0]->title}}</h1>
    <p><i>Адрес: {{ $objects[0]->address }}</i></p>
    <p>Цена: <b>{{ number_format($objects[0]->price, 0, '.', ' ') }}</b>
        @if($objects[0]->currency == 2)
            <i class="fa fa-usd" aria-hidden="true"></i>
        @elseif($objects[0]->currency == 1)
            <i class="fa fa-rub" aria-hidden="true"></i>
        @elseif($objects[0]->currency == 3)
            <i class="fa fa-eur" aria-hidden="true"></i>
        @endif
    </p>


    <div id="slider" class="flexslider">
        <ul class="slides">
            @foreach($objects[0]->gallery as $image)
                <li>
                    <img src="{{$image->gallery_img}}"/>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            @foreach($objects[0]->gallery as $image)
                <li>
                    <img src="{{$image->gallery_img}}"/>
                </li>
            @endforeach
        </ul>
    </div>



    <div class="col-md-6">
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            @if($objects[0]->type == 'houses')
                @if($objects[0]->floors != '')
                    <tr>
                        <td>Этажей:</td>
                        <td>{{$objects[0]->floors}}
                    </tr>
                @endif
                @if($objects[0]->full_area != '')
                    <tr>
                        <td>Общая площадь:</td>
                        <td>{{$objects[0]->full_area}}
                    </tr>
                @endif
                @if($objects[0]->land_area != '')
                    <tr>
                        <td>Площадь участка:</td>
                        <td>{{$objects[0]->land_area}}
                    </tr>
                @endif
                @if($objects[0]->to_sea != '')
                    <tr>
                        <td>До моря:</td>
                        <td>{{$objects[0]->to_sea}}
                    </tr>
                @endif
                @if($objects[0]->view != '')
                    <tr>
                        <td>Вид:</td>
                        <td>{{$objects[0]->view}}
                    </tr>
                @endif
                @if($objects[0]->land_appointment != '')
                    <tr>
                        <td>Назначение участка:</td>
                        <td>{{$objects[0]->land_appointment}}
                    </tr>
                @endif
                @if($objects[0]->ownership_type != '')
                    <tr>
                        <td>Форма собственности:</td>
                        <td>{{$objects[0]->ownership_type}}
                    </tr>
                @endif
                @if($objects[0]->rooms != '')
                    <tr>
                        <td>Комнат:</td>
                        <td>{{$objects[0]->rooms}}
                    </tr>
                @endif
                @if($objects[0]->bedrooms != '')
                    <tr>
                        <td>Спален:</td>
                        <td>{{$objects[0]->bedrooms}}
                    </tr>
                @endif
            @elseif($objects[0]->type == 'areas')
                @if($objects[0]->full_area != '')
                    <tr>
                        <td>Общая площадь:</td>
                        <td>{{$objects[0]->full_area}}
                    </tr>
                @endif
                @if($objects[0]->to_sea != '')
                    <tr>
                        <td>До моря:</td>
                        <td>{{$objects[0]->to_sea}}
                    </tr>
                @endif
                @if($objects[0]->view != '')
                    <tr>
                        <td>Вид:</td>
                        <td>{{$objects[0]->view}}
                    </tr>
                @endif
                @if($objects[0]->land_appointment != '')
                    <tr>
                        <td>Назначение участка:</td>
                        <td>{{$objects[0]->land_appointment}}
                    </tr>
                @endif
                @if($objects[0]->ownership_type != '')
                    <tr>
                        <td>Форма собственности:</td>
                        <td>{{$objects[0]->ownership_type}}
                    </tr>
                @endif

            @elseif($objects[0]->type == 'new-buildings')
                @if($objects[0]->floors != '')
                    <tr>
                        <td>Этажей:</td>
                        <td>{{$objects[0]->floors}}
                    </tr>
                @endif
                @if($objects[0]->max_area != '')
                    <tr>
                        <td>Максимальная площадь:</td>
                        <td>{{$objects[0]->max_area}}
                    </tr>
                @endif
                @if($objects[0]->min_area != '')
                    <tr>
                        <td>Минимальная площадь:</td>
                        <td>{{$objects[0]->min_area}}
                    </tr>
                @endif
                @if($objects[0]->to_sea != '')
                    <tr>
                        <td>До моря:</td>
                        <td>{{$objects[0]->to_sea}}
                    </tr>
                @endif
                @if($objects[0]->view != '')
                    <tr>
                        <td>Вид:</td>
                        <td>{{$objects[0]->view}}
                    </tr>
                @endif
                @if($objects[0]->min_price_m2 != '')
                    <tr>
                        <td>Минимальная цена за 1 кв.м.:</td>
                        <td>{{$objects[0]->min_price_m2}}
                    </tr>
                @endif
                @if($objects[0]->builded != '')
                    <tr>
                        <td>Дата постройки:</td>
                        <td>{{$objects[0]->builded}}
                    </tr>
                @endif

            @elseif($objects[0]->type == 'commercial')
                @if($objects[0]->floors != '')
                    <tr>
                        <td>Этажей:</td>
                        <td>{{$objects[0]->floors}}
                    </tr>
                @endif
                @if($objects[0]->floor != '')
                    <tr>
                        <td>Этаж:</td>
                        <td>{{$objects[0]->floor}}
                    </tr>
                @endif
                @if($objects[0]->full_area != '')
                    <tr>
                        <td>Общая площадь:</td>
                        <td>{{$objects[0]->full_area}}
                    </tr>
                @endif

            @elseif($objects[0]->type == 'flats')
                @if($objects[0]-> floor!= '')
                    <tr>
                        <td>Этаж:</td>
                        <td>{{$objects[0]->floor}}@if($objects[0]->floors != '')/{{$objects[0]->floors}}@endif</td>
                    </tr>
                @endif
                @if($objects[0]->full_area != '')
                    <tr>
                        <td>Общая площадь:</td>
                        <td>{{$objects[0]->full_area}}
                    </tr>
                @endif
                @if($objects[0]->living_area != '')
                    <tr>
                        <td>Жилая площадь:</td>
                        <td>{{$objects[0]->living_area}}
                    </tr>
                @endif
                @if($objects[0]->to_sea != '')
                    <tr>
                        <td>До моря:</td>
                        <td>{{$objects[0]->to_sea}}
                    </tr>
                @endif
                @if($objects[0]->view != '')
                    <tr>
                        <td>Вид:</td>
                        <td>{{$objects[0]->view}}
                    </tr>
                @endif
                @if($objects[0]->rooms != '')
                    <tr>
                        <td>Комнат:</td>
                        <td>{{$objects[0]->rooms}}
                    </tr>
                @endif
                @if($objects[0]->bedrooms != '')
                    <tr>
                        <td>Спален:</td>
                        <td>{{$objects[0]->bedrooms}}
                    </tr>
                @endif
                @if($objects[0]->toilets != '')
                    <tr>
                        <td>Санузлов:</td>
                        <td>{{$objects[0]->toilets}}
                    </tr>
                @endif
                @if($objects[0]->flat_type != '')
                    <tr>
                        <td>Тип квартиры:</td>
                        <td>{{$objects[0]->flat_type}}
                    </tr>
                @endif
                @if($objects[0]->potolok != '')
                    <tr>
                        <td>Высота потолков:</td>
                        <td>{{$objects[0]->potolok}}
                    </tr>
                @endif
                @if($objects[0]->heating != '')
                    <tr>
                        <td>Отопление:</td>
                        <td>{{$objects[0]->heating}}
                    </tr>
                @endif
                @if($objects[0]->hot_water != '')
                    <tr>
                        <td>Горячая вода:</td>
                        <td>{{$objects[0]->hot_water}}
                    </tr>
                @endif
                @if($objects[0]->gas != '')
                    <tr>
                        <td>Газ:</td>
                        <td>{{$objects[0]->gas}}
                    </tr>
                @endif
                @if($objects[0]->condition != '')
                    <tr>
                        <td>Состояние:</td>
                        <td>{{$objects[0]->condition}}
                    </tr>
                @endif

            @endif
            @if($objects[0]->distance_to_city != 0)
                <tr>
                    <td>Расстояние до Ялты:</td>
                    <td>{{$objects[0]->distance_to_city}}
                </tr>
            @endif
        </table>
    </div>
    </div>
    <div class="col-md-6">
        <div id="map" style="height: 300px"></div>
    </div>

    <div class="col-md-12">
        <h3>Описание</h3>
        {!! $objects[0]->body !!}
    </div>


    <div id="map" style="height: 300px"></div>

    <div class="col-md-12"><a href="{{ URL::previous() }}" class="btn btn-default btn-sm">Вернуться назад</a></div>


    @include('errors.list')
@stop

@section('scripts')
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [{!! $objects[0]->map_center !!}],
                zoom:{!! $objects[0]->map_zoom !!}
            });
            myMap.behaviors.disable('scrollZoom');
            myPlacemark = new ymaps.Placemark([{!! $objects[0]->map_coordinates !!}], {
//            hintContent: 'Москва!',
//            balloonContent: 'Столица России'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>
@stop