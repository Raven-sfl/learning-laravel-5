@extends('layouts.app')
@section('content')
    <section id="banner">

        <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
                <li>
                    <img src="img/slides/1.jpg" alt=""/>
                    <div class="flex-caption">
                        <h3>Best Properties</h3>
                        <p>Opportunities don't happen. You create them</p>

                    </div>
                </li>
                <li>
                    <img src="img/slides/2.jpg" alt=""/>
                    <div class="flex-caption">
                        <h3>Gated Villas</h3>
                        <p>It is better to fail in originality than to succeed</p>

                    </div>
                </li>
                <li>
                    <img src="img/slides/2.jpg" alt=""/>
                    <div class="flex-caption">
                        <h3>Gated Villas</h3>
                        <p>It is better to fail in originality than to succeed</p>

                    </div>
                </li>
            </ul>
        </div>
        <!-- end slider -->

    </section>

    <section id="content">

        <div class="container">
            <div class="row">
                <div class="skill-home">
                    <div class="skill-home-solid clearfix">
                        <div class="col-md-3 col-sm-6 text-center">
                            <span class="icons c1"><i class="fa fa-home"></i></span>
                            <div class="box-area">
                                <h3>New Projects</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <span class="icons c2"><i class="fa fa-rocket"></i></span>
                            <div class="box-area">
                                <h3>Ready To Move</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <span class="icons c3"><i class="fa fa-trophy"></i></span>
                            <div class="box-area">
                                <h3>Commercial</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <span class="icons c4"><i class="fa fa-star"></i></span>
                            <div class="box-area">
                                <h3>Gated Projects</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{--<section class="section-padding">--}}
        {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
        {{--<div class="section-title text-center">--}}
        {{--<h2>Trending Projects</h2>--}}
        {{--<p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row service-v1 margin-bottom-40">--}}
        {{--<div class="col-md-3 col-sm-6 md-margin-bottom-40">--}}
        {{--<img class="img-responsive" src="img/img1.jpg" alt="">--}}
        {{--<h3>Apartments</h3>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 md-margin-bottom-40">--}}
        {{--<img class="img-responsive" src="img/img2.jpg" alt="">--}}
        {{--<h3>luxury Villas</h3>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 md-margin-bottom-40">--}}
        {{--<img class="img-responsive" src="img/img3.jpg" alt="">--}}
        {{--<h3>Gated Projects</h3>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 md-margin-bottom-40">--}}
        {{--<img class="img-responsive" src="img/img4.jpg" alt="">--}}
        {{--<h3>Apartments</h3>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}


    </section>

    <section class="section-padding gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Акции и выгодные предложения</h2>
                        <p>Акции агентства недвижимости «Top-City», Ялта. Успейте купить дом, квартиру или таунхас по
                            низким ценам. <br> Гарант качества и выгодные условия.</p>
                    </div>
                </div>
            </div>
            <div class="row service-v1 margin-bottom-40">

                @foreach($actions as $action)
                    <div class="col-md-4 md-margin-bottom-40">
                        @if(isset($action->gallery->first()->gallery_img))
                            <img class="img-responsive" src="{{$action->gallery->first()->gallery_img}}" alt="">
                        @endif
                        <h3>{{$action->title}}</h3>
                        {!! str_limit($action->body, 100) !!}...<br>
                        <a href="/objects/{{$action->type}}/{{$action->base_id}}" class="btn btn-primary">Подробнее</a>
                    </div>
                @endforeach

            </div>
            <a href="#" class="btn btn-primary align-right" style="background-color: #428bca">Больше акций</a>
            {{--<div class="row service-v1 margin-bottom-40">--}}
            {{--<div class="col-md-4 md-margin-bottom-40">--}}
            {{--<img class="img-responsive" src="img/img8.jpg" alt="">--}}
            {{--<h3>Apartments</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 md-margin-bottom-40">--}}
            {{--<img class="img-responsive" src="img/img9.jpg" alt="">--}}
            {{--<h3>luxury Villas</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 md-margin-bottom-40">--}}
            {{--<img class="img-responsive" src="img/img10.jpg" alt="">--}}
            {{--<h3>Gated Projects</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Об агенстве</h2>
                        <p>Агентство «Top-City» работает на рынке недвижимости с 1997 года. Агентство специализируется
                            на продаже, покупке на первичном и вторичном рынках жилья, аренде, коммерческой
                            недвижимости, а также предоставляет услуги в сфере консалтинга и аналитики. </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-text">
                        <p>Высококвалифицированные специалисты агентства осуществляют помощь в получении ипотеки,
                            юридическое сопровождение сделок, покупку жилья при помощи субсидий.
                            Со дня основания агентство «Top-City» характеризуют динамичное развитие и финансовая
                            устойчивость. Прозрачность отношений с клиентами, включая гибкий подход к ценообразованию в
                            области риелторских и консалтинговых услуг – основа доверия клиентов и партнеров.</p>

                        <ul class="withArrow">
                            <li><span class="fa fa-angle-right"></span> покупка и продажа жилья в Ялте и на ЮБК;</li>
                            <li><span class="fa fa-angle-right"></span> покупка, продажа, обмен жилья в Ялте и на ЮБК на
                                вторичном рынке;
                            </li>
                            <li><span class="fa fa-angle-right"></span> коммерческая недвижимость;</li>
                            <li><span class="fa fa-angle-right"></span> консалтинговые услуги.</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Узнать больше</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-image">
                        <img src="img/about.jpg" alt="About Images">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop