@section('content')
    {{ HTML::style('/js/fancybox/jquery.fancybox-1.3.4.css') }}
    {{ HTML::style('/js/trackbar/trackbar.css') }}
    {{ HTML::style('/css/custom/brand.css') }}
    {{ HTML::script('/js/trackbar/jquery-1.2.3.min.js') }}
    {{ HTML::script('/js/trackbar/jquery.trackbar.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#blocktrackbar').trackbar({
                onMove: function () {
                    document.getElementById("min-price").value = this.leftValue;
                    document.getElementById("max-price").value = this.rightValue;
                },
                width: 160,
                leftLimit: 500000,
                leftValue: 300000,
                rightLimit: 10000000,
                rightValue: 8000000,
                roundUp: 100000

            });
        });
    </script>
    <section id="brand" class="content">
        <div class="row rows">

            @if ($result && !$result->isEmpty())
                <div id="title">{{ $result->get(0)->brand->name }}</div>
                <hr/>

                <div id="links" class="col-md-12">
                    <a href="{{ Request::root() . '/brand/' . $result->get(0)->brand->slag_name . '/male' }}">Мужские</a>
                    <a href="{{ Request::root() . '/brand/' . $result->get(0)->brand->slag_name . '/female' }}">Женские</a>

                </div>

                <aside id="products-container" class="col-md-8">


                    @foreach ($result as $product)
                        <div class="col-md-4 product">

                            @if ($product->nalichie == 1)
                                <h4 id="nalichie">В наличии </h4>
                            @else
                                <h4 id="nalichienet">Под заказ </h4>
                            @endif

                            <a href="{{ Request::root() }}/details/{{ $product->id }}">
                                {{ HTML::image('/img/prod_img/' . $product->main_image, '', array('class' => 'main-image')) }}
                            </a>

                            @if (!is_null($product->brand->sale))
                                {{ HTML::image('/img/sales/' . $product->brand->sale . '.png', '', array('class' => 'sale-img')) }}
                            @endif


                            <span class="prod-name">{{ $product->brand->name }}&nbsp;
                                {{ $product->name }}</span>

                            <h5> Интернет маг.<font style="margin-left: 7px;"><strong><font
                                                style="text-decoration:underline red; ">{{ $product->price }}</font></strong>
                                    руб.</font></h5>
                            <h5> Розничный маг.<strong>{{ $product->pricemag }}</strong> руб.</h5>

                            <div class="button-wrapper">
                                <button class="btn btn-primary buy hidden" data-prod-id="{{ $product->id }}">
                                    Купить
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <div id="paginate">{{ $result->links() }}</div>
                </aside>

                <aside id="filters">
                    {{ Form::open(array('url' => Request::url()."/filters")) }}
                    <div id="filters-title">
                        <center>Выбор по параметрам:</center>
                    </div>

                    <div id="filters-price" class="filters-item">
                        <label>Розничная цена</label><br/>
                        <input type="text" id="min-price" name="min-price" class="form-control input-sm"/>
                        <div class="spring"></div>
                        <input type="text" id="max-price" name="max-price" class="form-control input-sm"/>
                        <div id="blocktrackbar">trackbar</div>
                    </div>

                    <!-- <div class="hidden-filters">  -->
                    <div id="filters-diameter" class="filters-item">
                        <label>Диаметр</label><br/>
                        <input type="text" name="min-diameter" class="form-control input-sm left"/>
                        <div class="spring"></div>
                        <input type="text" name="max-diameter" class="form-control input-sm right"/>
                    </div>

                    <div id="filters-thickness" class="filters-item">
                        <label>Толщина</label><br/>
                        <input type="text" name="min-thickness" class="form-control input-sm left"/>
                        <div class="spring"></div>
                        <input type="text" name="max-thickness" class="form-control input-sm right"/>
                    </div>
                    <!--  </div> -->

                    @foreach ($open_filters as $filter)
                        <div id="{{ 'filters-' . $filter->ascii_name }}" class="filters-item">
                            <label class="filter-name">{{ $filter->name }}</label><br/>
                            <div class="checkboxses">
                                @foreach ($filter->option_values as $value)
                                    <input type="checkbox" name="{{ $filter->ascii_name . '[]' }}"
                                           value="{{ $value->ascii_name }}"/>
                                    <span>{{ $value->name }}</span><br/>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <br/>
                    <!-- <span id="show-flters">Показать больше фильтров</span> -->

                    <div class="hidden-filters">
                        @foreach ($hidden_filters as $filter)
                            <div id="{{ 'filters-' . $filter->ascii_name }}" class="filters-item">
                                <label class="filter-name">{{ $filter->name }}</label><br/>
                                <div class="checkboxses">

                                    @foreach ($filter->option_values as $value)
                                        <input type="checkbox" name="{{ $filter->ascii_name . '[]' }}"
                                               value="{{ $value->ascii_name }}"/>
                                        <span>{{ $value->name }}</span><br/>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                        <span id="hide-flters">Скрыть дополнительные фильтры</span>
                    </div>

                    <input id="submit" type="submit" value="Показать"/>
                    <input id="reset" type="reset" value="Сбросить"/>
                    {{ Form::close() }}
                </aside>

            @else
                <h1>Здесь пока ничего нет</h1>
            @endif

        </div>

        @include ('modals.added-to-cart')

        {{ HTML::script('/js/custom/brand.js') }}
    </section>

@show