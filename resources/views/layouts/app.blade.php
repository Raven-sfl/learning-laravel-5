<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- css -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/public/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="/public/css/flexslider.css" rel="stylesheet"/>
    <link href="/public/css/bootstrap-slider.min.css" rel="stylesheet"/>
    <link href="/public/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet"/>
    <link href='/public/fonts/flexslider-icon.ttf' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        function showHide(element_id) {
            //Если элемент с id-шником element_id существует
            if (document.getElementById(element_id)) {
                //Записываем ссылку на элемент в переменную obj
                var obj = document.getElementById(element_id);
                //Если css-свойство display не block, то:
                if (obj.style.display != "block") {
                    obj.style.display = "block"; //Показываем элемент
                    $("#fil_btn").val("Скрыть фильтр");
                }
                else {
                    obj.style.display = "none"; //Скрываем элемент
                    $("#fil_btn").val("Показать фильтр");
                }
            }
            //Если элемент с id-шником element_id не найден, то выводим сообщение
            else alert("Элемент с id: " + element_id + " не найден!");
        }
    </script>
</head>
<body>
<div id="wrapper" class="home-page">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="pull-left "> Выберите валюту цен: </p>
                    <label class="currency ruble"><input type="radio" class="currency" name="setcy" value="1"
                                                         onclick="setCurrency(1)"
                                                         @if(\Illuminate\Support\Facades\Session::get('currency')== 1) checked
                                                         @elseif(is_null(\Illuminate\Support\Facades\Cookie::get('currency'))) checked @endif><img
                                src="/img/flags/ru.png"></label>
                    <label class="currency dollar"><input type="radio" name="setcy" value="3" onclick="setCurrency(2)"
                                                          @if(\Illuminate\Support\Facades\Session::get('currency')== 2) checked @endif/><img
                                src="/img/flags/us.png"></label>
                    <label class="currency euro"><input type="radio" name="setcy" value="2" onclick="setCurrency(3)"
                                                        @if(\Illuminate\Support\Facades\Session::get('currency')== 3) checked @endif/><img
                                src="/img/flags/eu.png"></label>
                    <p class="pull-right"><i class="fa fa-phone"></i> +7 (978) 742-56-03, +7 (978) 019-25-78</p>
                </div>
            </div>
        </div>
    </div>
    <!-- start header -->
    <header>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Квартиры<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/objects/flats">Все квартиры</a></li>
                                <li><a href="/objects/flats/rooms1">Однокомнатные квартиры</a></li>
                                <li><a href="/objects/flats/rooms2">Двухкомнатные квартиры</a></li>
                                <li><a href="/objects/flats/rooms3">Трехкомнатные квартиры</a></li>
                                <li><a href="/objects/flats/rooms4">Четырехкомнатные и более квартиры</a></li>
                            </ul>
                        </li>
                        <li><a href="/objects/houses">Дома</a></li>
                        <li><a href="/objects/areas">Участки</a></li>
                        <li><a href="/objects/new-buildings">Новостройки</a></li>
                        <li><a href="/objects/commercial">Коммерческие</a></li>
                        <li><a href="/articles">Статьи</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#"><i class="fa fa-heart-o" style="font-weight: 300%" aria-hidden="true"> </i> 120</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    @if(Route::getCurrentRoute()->getPath() != '/')
        <section id="content">
            <div class="container content">
                <div class="row">
                    <div class="col-md-12 topbar">
                        <div id="filter" class="container content"
                             style="display: none; color: #333; padding-bottom: 15px">
                            {!! Form::open(['action'=>['frontend\ObjectsController@filter'],'method' => 'get']) !!}
                            <div class="col-md-3 col-sm-3">
                                <div class="single-query form-group">
                                    <label>Тип недвижимости</label>
                                    {{ Form::select('type', [
                                   'flats' => 'Квартиры',
                                   'houses' => 'Дома',
                                   'areas' => 'Участки',
                                   'new-buildings' => 'Новостройки',
                                   'commercial' => 'Коммерческие'], null, ['class' => 'form-control'])
                                }}
                                </div>
                            </div>
                            <div class="input-group">

                                {!! Form::text('pd', null , ['class'=> '','placeholder'=>'Мин. цена', 'style'=>'height:46px','id'=>'ex6SliderVal']) !!}
                                {!! Form::text('pu', null , ['class'=> '','placeholder'=>'Макс. цена', 'style'=>'height:46px']) !!}
                                <input id="ex6" type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="3"/>
                                <button class="btn btn-small" type="submit">Фильтровать</button>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="col-md-6">
                            <input type="button" class="btn btn-small" id="fil_btn" value="Показать фильтр"
                                   onclick="showHide('filter')"/>
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['action'=>['frontend\ObjectsController@searchId']]) !!}
                            <div class="input-group">
                                {!! Form::text('id', null , ['class'=> 'form-control','placeholder'=>'Поиск по ID', 'style'=>'height:46px']) !!}
                                <div class="input-group-btn">
                                    <button class="btn btn-small" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        @endif

                        @yield('content')

                        @if(Route::getCurrentRoute()->getPath() != '/')
                    </div>

                </div>

            </div>
        </section>
    @endif


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <h5 class="widgetheading">Наши контакты</h5>
                        <address>
                            <strong>Top-City</strong><br>
                            Республика Крым, <br>
                            г.Ялта, ул. Гоголя 16
                        </address>
                        <p>
                            <i class="icon-phone"></i> +7 (978) 742-56-03 <br>
                            <i class="icon-phone"></i> +7 (978) 019-25-78 <br>
                            <i class="icon-envelope-alt"></i> contact@top-city.ru
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h5 class="widgetheading">Новые объекты</h5>
                        <ul class="link-list">
                            @if(isset($latest_objects))
                                @foreach($latest_objects as $latest_object)
                                    <li>
                                        <a href="/objects/{{$latest_object->type}}/{{$latest_object->base_id}}">{{$latest_object->title}}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h5 class="widgetheading">Последние статьи</h5>
                        <ul class="link-list">
                            @if(isset($latest_articles))
                                @foreach($latest_articles as $latest_article)
                                    <li><a href="/articles/{{$latest_article->id}}">{{$latest_article->title}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h5 class="widgetheading">Recent News</h5>
                        <ul class="link-list">
                            <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                            <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                            <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>
                                <span>&copy; Bootstrap Template 2018 All right reserved. Template By </span><a
                                        href="http://webthemez.com/free-bootstrap-templates/"
                                        target="_blank">WebThemez</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="social-network">
                            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-placement="top" title="Vkontakte"><i class="fa fa-vk"></i></a>
                            </li>
                            <li><a href="#" data-placement="top" title="Google plus"><i
                                            class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/public/js/jquery.js"></script>
<script src="/public/js/jquery.easing.1.3.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.fancybox.pack.js"></script>
<script src="/public/js/jquery.fancybox-media.js"></script>
<script src="/public/js/jquery.flexslider.js"></script>
<script src="/public/js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="/public/js/modernizr.custom.js"></script>
<script src="/public/js/jquery.isotope.min.js"></script>
<script src="/public/js/jquery.magnific-popup.min.js"></script>
<script src="/public/js/animate.js"></script>
<script src="/public/js/custom.js"></script>
<script src="/public/js/owl-carousel/owl.carousel.js"></script>
<script src="/public/js/bootstrap-slider.min.js"></script>


<script>
    $("#ex6").slider();
    $("#ex6").on("slide", function(slideEvt) {
        $("#ex6SliderVal").text(slideEvt.value);
    });
    function setCurrency(value) {
        currency_id = value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/currency/set',
            type: 'POST',
            data: {id: currency_id},
            success: function () {
                location.reload()
            },
            error: function (msg) {
                alert(currency_id);
                console.log(msg);// если ошибка, то можно посмотреть в консоле
            }
        });
    }
</script>
<script>
    function radioLink(dest) {
        if (document.radioLinks.pickme)
            if (dest == 'date')
                location = '{{URL::current()}}'
        if (dest == 'priceUp')
            location = '{{URL::current()}}?sort=priceUp'
        if (dest == 'priceDown')
            location = '{{URL::current()}}?sort=priceDown'
    }
</script>
<script>
    $(window).load(function () {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>
@yield('scripts')
</body>
</html>