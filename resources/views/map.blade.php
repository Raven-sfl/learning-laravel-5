<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Инструмент для определения координат - API Яндекс.Карт 2.0</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="/examples/add-users-ymapsapi2/css/bootstrap.min.css" rel="stylesheet"/>

    <style>
        html, body, #YMapsID {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #coord_form {
            position: absolute;
            z-index: 1000;
            background: none repeat scroll 0% 0% rgb(255, 255, 255);
            list-style: none outside none;
            padding: 10px;
            margin: 0px;
            right: 10px;
            top: 50px;
        }
    </style>

    <script type="text/javascript">

        var myMap, myPlacemark, coords;

        ymaps.ready(init);

        function init() {

            //Определяем начальные параметры карты
            myMap = new ymaps.Map('YMapsID', {
                center: [44.4730, 34.1783],
                zoom: 13
            });

            //Определяем элемент управления поиск по карте
            var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});

            //Добавляем элементы управления на карту
            myMap.controls
                .add(SearchControl)
                .add('zoomControl')
                .add('typeSelector')
                .add('mapTools');
            myMap.behaviors.enable('scrollZoom');

            coords = [56.326944, 44.0075];

            //Определяем метку и добавляем ее на карту
            myPlacemark = new ymaps.Placemark([44.4877, 34.1481], {}, {preset: "twirl#redIcon", draggable: true});

            myMap.geoObjects.add(myPlacemark);

            //Отслеживаем событие перемещения метки
            myPlacemark.events.add("dragend", function (e) {
                coords = this.geometry.getCoordinates();
                savecoordinats();
            }, myPlacemark);

            //Отслеживаем событие щелчка по карте
            myMap.events.add('click', function (e) {
                coords = e.get('coordPosition');
                savecoordinats();
            });

            //Отслеживаем событие выбора результата поиска
            SearchControl.events.add("resultselect", function (e) {
                coords = SearchControl.getResultsArray()[0].geometry.getCoordinates();
                savecoordinats();
            });

            //Ослеживаем событие изменения области просмотра карты - масштаб и центр карты
            myMap.events.add('boundschange', function (event) {
                if (event.get('newZoom') != event.get('oldZoom')) {
                    savecoordinats();
                }
                if (event.get('newCenter') != event.get('oldCenter')) {
                    savecoordinats();
                }

            });

        }

        //Функция для передачи полученных значений в форму
        function savecoordinats() {
            var new_coords = [coords[0].toFixed(4), coords[1].toFixed(4)];
            myPlacemark.getOverlay().getData().geometry.setCoordinates(new_coords);
            document.getElementById("latlongmet").value = new_coords;
            document.getElementById("mapzoom").value = myMap.getZoom();
            var center = myMap.getCenter();
            var new_center = [center[0].toFixed(4), center[1].toFixed(4)];
            document.getElementById("latlongcenter").value = new_center;
        }

    </script>

</head>

<body>

<div id="YMapsID"></div>
<div id="coord_form">
    <p><label>Координаты метки: </label><input id="latlongmet" class="input-medium" name="icon_text"/><br/>
        <label>Масштаб: </label><input id="mapzoom" class="input-medium" name="icon_text"/></p>
    <p><label>Центр карты: </label><input id="latlongcenter" class="input-medium" name="icon_text"/></p>
</div>

</body>

</html>