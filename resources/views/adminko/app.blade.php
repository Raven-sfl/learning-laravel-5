<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keywords')"/>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
            type="text/javascript" charset="utf-8"></script>
    <script src="/js/dropzone.js"></script>
    <script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

</head>
<body>


<nav class="navbar navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Top-City</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Логин</a></li>
                    <li><a href="{{ url('/register') }}">Регистрация</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="row">

    <div>

        <div class="collapse navbar-collapse col-md-2" id="bs-example-navbar-collapse-1">
            <ul class="nav nav-list">
            @if (Auth::guest())
            @else
                <!--<li class="nav-header" style="text-align: center ">Недвижимость</li>-->
                    <li><a href="{{ url('/adminko/pages') }}">Страницы</a></li>
                    <li><a href="{{ url('/adminko/articles') }}">Статьи</a></li>
                    <li><a href="{{ url('/adminko/objects') }}">Объекты</a></li>
                    <li><a href="{{ url('/adminko/objects/houses') }}">Дом</a></li>
                    <li><a href="{{ url('/adminko/objects/areas') }}">Участок</a></li>
                    <li><a href="{{ url('/adminko/objects/new-buildings') }}">Новостройка</a></li>
                    <li><a href="{{ url('/adminko/objects/commercial') }}">Коммерческая</a></li>
                    <li><a href="{{ url('/adminko/objects/flats') }}">Квартира</a></li>
            </ul>
            @endif

        </div>

        <div class="col-md-8">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('flash_message')}}
                </div>
            @endif
            @yield('content')
        </div>


    </div>
</div>


<!-- Scripts -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>jQuery('ul.nav > li').hover(function () {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
    }, function () {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
    })</script>

<script>
    var editor1 = CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '/elfinder/ckeditor'
    });
    var editor2 = CKEDITOR.replace('editor2', {
        filebrowserBrowseUrl: '/elfinder/ckeditor'
    });
</script>
<script>

    //		$(".backward").click(function(){
    //			if (confirm("Выйти без сохранения?")) {
    //				return true;
    //			} else {
    //				return false;
    //			}
    //		});

    $('.del_image').click(function () {
        if (confirm("Таки удалить?")) {
            div = $(this).parent(); //div, который содержить и картинку и кнопку
            src = $(this).prev().attr('src'); //ссылка на кратинку
            item_id = $("#item_id").val(); //id товара

            $.ajax({
                url: '/del_image',
                method: 'POST',
                data: {src: src, item_id: item_id},
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').attr('value')
                },
                success: function (res) {
                    div.remove(); //если все прошло без ошибок то удаляем div
                },
                error: function (msg) {
                    console.log(msg);// если ошибка, то можно посмотреть в консоле
                }
            });

        } else {
            return false;
        }

    })
</script>

<script>

    $('.del_object_image').click(function () {
        div = $(this).closest('tr'); //div, который содержить и картинку и кнопку
//			div=$(this).parent(); //div, который содержить и картинку и кнопку
        //src=$(this).prev().attr('src'); //ссылка на кратинку
        image_id = $("#image_id").val(); //id товара
        alert(image_id);

        $.ajax({
            url: '/del_object_image',
            method: 'POST',
            data: {image_id: image_id},

            headers: {
                'X-CSRF-Token': $('input[name="_token"]').attr('value')
            },
            success: function (res) {
                div.remove(); //если все прошло без ошибок то удаляем div
                //$(this).closest('tr').remove();
            },
            error: function (msg) {
                console.log(msg);// если ошибка, то можно посмотреть в консоле
            }
        });

    })
</script>

<script type="text/javascript">

    var myMap, myPlacemark, coords;

    ymaps.ready(init);

    function init() {

        //Определяем начальные параметры карты
        myMap = new ymaps.Map('YMapsID', {
            center: [44.4859, 34.1836],
            zoom: 12
        });

        //Определяем элемент управления поиск по карте
        var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});

        //Добавляем элементы управления на карту
        myMap.controls
            .add(SearchControl)
            .add('zoomControl')
            .add('typeSelector')
            .add('mapTools');
        myMap.behaviors.disable('scrollZoom');

        coords = [44.4942, 34.1652];

        //Определяем метку и добавляем ее на карту
        myPlacemark = new ymaps.Placemark(document.getElementById('map_coordinates').value.split(','), {}, {
            preset: "twirl#redIcon",
            draggable: true
        });

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
        document.getElementById("map_coordinates").value = new_coords;
        document.getElementById("map_zoom").value = myMap.getZoom();
        var center = myMap.getCenter();
        var new_center = [center[0].toFixed(4), center[1].toFixed(4)];
        document.getElementById("map_center").value = new_center;
    }

</script>

{{--<script>--}}
{{--$('.add_images').click(function()--}}
{{--{--}}
{{--all=$('input[name="gallery_img[]"]');--}}
{{--if(all.length==15) return; //ограничим количество картинок 1 превью и 10 дополнительных картинок.--}}
{{--field=$('input[name="gallery_img[]"]:first').clone(); // клонируем поле preview--}}
{{--$(this).after(field); //вставляем поле после кнопки--}}
{{--field2=$('input[name="gallery_alt[]"]:first').clone(); // клонируем поле preview--}}
{{--$(this).after(field).after(field2); //вставляем поле после кнопки--}}
{{--field3=$('input[name="gallery_title[]"]:first').clone(); // клонируем поле preview--}}
{{--$(this).after(field).after(field2).after(field3); //вставляем поле после кнопки--}}

{{--})--}}
{{--</script>--}}

<script language="javascript">

    $('.mes-flash').fadeIn('slow').delay(2000).hide(500);

    function addRow(tableID) {

        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var colCount = table.rows[1].cells.length;

        for (var i = 0; i < colCount; i++) {

            var newcell = row.insertCell(i);
            newcell.innerHTML = table.rows[1].cells[i].innerHTML;
            //alert(newcell.childNodes);
            switch (newcell.childNodes[0].type) {
                case "text":
                    newcell.childNodes[0].value = "";
                    break;
                case "hidden":
                    newcell.childNodes[0].value = "";
                    break;
                case "textarea":
                    newcell.childNodes[0].value = "";
                    break;
                case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;
                case "select-one":
                    newcell.childNodes[0].selectedIndex = 0;
                    break;
            }
        }
    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    if (rowCount <= 2) {
                        alert("Ай-яй-яй! Низя!");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        } catch (e) {
            alert(e);
        }
    }
</script>

</body>
</html>
