<div class="form-group">
    <div class="col-md-12">
        <h3>Общие сведения</h3>

        {!! Form::text('type', $type , ['class'=> 'hidden']) !!}
        {!! Form::label('title', 'ID объекта') !!}
        {!! Form::text('base_id', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Название') !!}
        {!! Form::text('title', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Описание') !!}
        {!! Form::textarea('body', null , ['class'=> 'form-control', 'id'=>'editor1']) !!}
        {!! Form::label('title', 'Адрес') !!}
        {!! Form::text('address', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Расстояние до Ялты') !!}
        {!! Form::text('distance_to_city', '0' , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Цена') !!}
        {!! Form::text('price', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Валюта') !!}
        {{ Form::select ('currency', [ '1' => 'Рубль', '2' => 'Доллар', '3'=>'Евро'], null , ['class'=> 'form-control']) }}
        {!! Form::label('title', 'Координаты на карте') !!}
        {!! Form::text('map_coordinates', null , ['class'=> 'form-control', 'id'=>'map_coordinates']) !!}
        {!! Form::label('title', 'Масштаб') !!}
        {!! Form::text('map_zoom', null , ['class'=> 'form-control', 'id'=>'map_zoom']) !!}
        {!! Form::label('title', 'Центр') !!}
        {!! Form::text('map_center', null , ['class'=> 'form-control', 'id'=>'map_center']) !!}
        <hr>
        <div id="YMapsID" style="height: 400px"></div>
        <hr>
    </div>
    <div id="by_category">
        @if ($type=='houses')
            @include('adminko.objects.house_form')
        @endif
        @if($type=='areas')
            @include('adminko.objects.land_form')
        @endif
        @if($type=='new-buildings')
            @include('adminko.objects.new_house_form')
        @endif
        @if($type=='commercial')
            @include('adminko.objects.commercial_form')
        @endif
        @if($type=='flats')
            @include('adminko.objects.flat_form')
        @endif
    </div>
    <div class="col-md-12">
        <h3>Галерея</h3>

        @if(!empty($objects->gallery))
            <table class="table table-bordered">
                <tr>

                </tr>
                @foreach($objects->gallery as $image)
                    <input type="hidden" id="item_id" value="{{$objects->id}}"/>

                    <tr>

                        <td><img width=100 src="{{$image->gallery_img}}"></td>
                        <td>{!! Form::text('stored_image_id[]', $image->id , ['class'=> 'hidden', 'id'=>'image_id']) !!}</td>
                        <td>{!! Form::text('stored_gallery_title[]', $image->gallery_title , ['class'=> 'form-control']) !!}</td>
                        <td>{!! Form::text('stored_gallery_alt[]', $image->gallery_alt , ['class'=> 'form-control']) !!}</td>
                        <td>
                            <button type="button" title="Удалить" class="btn btn-danger del_object_image btn-xs"><i
                                        class="glyphicon glyphicon-minus"></i></button>
                        </td>
                    </tr>

                @endforeach
            </table>
            <br>
        @endif
        <table class="table table-bordered" id="stopped">
            <tr>
                <td>Отметка</td>
                <td>Файл</td>
                <td>Тайтл для изображения</td>
                <td>Альт для изображения</td>

            </tr>
            <tr class="table-content" name="stopped">
                <td><input class="form-control" type="checkbox" name="chk"/></td>
                <td><input type="file" name="gallery_img[]" class="form-control"/></td>
                <td><input type="text" name="gallery_title[]" class="form-control"/></td>
                <td><input type="text" name="gallery_alt[]" class="form-control"/></td>


            </tr>
        </table>
        <button class="btn btn-primary add_images" type="button" onclick="addRow('stopped')"><i
                    class="glyphicon glyphicon-plus"></i></button>
        <button class="btn btn-primary add_images" type="button" onclick="deleteRow('stopped')"><i
                    class="glyphicon glyphicon-minus"></i></button>

        {{--<div name="gallery-im">--}}
        {{--<input type="text" name="gallery_title[]" class="form-control"/><br>--}}
        {{--<input type="text" name="gallery_alt[]" class="form-control"/><br>--}}
        {{--<input type="file" name="gallery_img[]" class="form-control"/><br>--}}

        {{--<button class="btn btn-primary add_images" type="button"><i class="glyphicon glyphicon-plus"></i></button>--}}
        {{--</div>--}}
    </div>

    <div class="col-md-12">
        <h3>Метатеги:</h3>
        {!! Form::label('title', 'title') !!}
        {!! Form::text('meta_title', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'description') !!}
        {!! Form::text('meta_description', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'keywords') !!}
        {!! Form::text('meta_keywords', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Алиас') !!}
        {!! Form::text('slug', null , ['class'=> 'form-control']) !!}
    </div>
    <div class="col-md-12">
        {!! Form::label('title', 'Опубликовано') !!}
        {!! Form::hidden('published',0) !!}
        {!! Form::checkbox('published', '1')  !!}
        {!! Form::label('title', 'Акция') !!}
        {!! Form::hidden('action',0) !!}
        {!! Form::checkbox('action', '1')  !!}
        <br>
        {!! Form::label('title', 'Дата публикации') !!}
        {!! Form::input('date','published_at', date('Y-m-d') , ['class'=> 'form-control']) !!}

        <br>
        {!! Form::submit($buttonText, ['class'=>'btn btn-primary form-control' ]) !!}
    </div>
</div>