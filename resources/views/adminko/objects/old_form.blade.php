<div class="form-group">
    <div>
        <h3>Общие сведения</h3>
        {!! Form::label('title', 'ID объекта') !!}
        {!! Form::text('base_id', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Тип объекта') !!}
        {!! Form::select('type', array('1' => 'Дом', '2' => 'Участок', '3' => 'Новостройка', '4' => 'Коммерческая', '5' => 'Квартира'), null, ['class'=> 'form-control', 'id'=>'type', 'onchange'=>'showDiv(this)']) !!}
        {!! Form::label('title', 'Название') !!}
        {!! Form::text('title', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Описание') !!}
        {!! Form::textarea('body', null , ['class'=> 'form-control', 'id'=>'editor1']) !!}
        {!! Form::label('title', 'Адрес') !!}
        {!! Form::text('address', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Расстояние до Ялты') !!}
        {!! Form::text('distance_to_city', '0' , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Цена в долларах') !!}
        {!! Form::text('price', null , ['class'=> 'form-control']) !!}
    </div>
    <div id="by_category">
        <div id="house" style="display: block;">
            <h3>Характеристики дома: </h3>
            {!! Form::label('title', 'Этажей') !!}
            {!! Form::text('floors', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Общая площадь') !!}
            {!! Form::text('full_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Площадь участка') !!}
            {!! Form::text('land_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'До моря') !!}
            {!! Form::text('to_sea', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Вид') !!}
            {!! Form::text('view', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Назначение участка') !!}
            {!! Form::text('land_appointment', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Форма собственности') !!}
            {!! Form::text('ownership_type', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Комнат') !!}
            {!! Form::text('rooms', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Спален') !!}
            {!! Form::text('bedrooms', null , ['class'=> 'form-control']) !!}


        </div>
        <div id="land" style="display: none;">
            <h3>Характеристики участка:</h3>
            {!! Form::label('title', 'Общая площадь') !!}
            {!! Form::text('full_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'До моря') !!}
            {!! Form::text('to_sea', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Вид') !!}
            {!! Form::text('view', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Назначение участка') !!}
            {!! Form::text('land_appointment', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Форма собственности') !!}
            {!! Form::text('ownership_type', null , ['class'=> 'form-control']) !!}


        </div>
        <div id="new_house" style="display: none;">
            <h3>Характеристики новостройки:</h3>
            {!! Form::label('title', 'Этажей') !!}
            {!! Form::text('floors', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Максимальная площадь') !!}
            {!! Form::text('max_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Минимальная площадь') !!}
            {!! Form::text('min_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'До моря') !!}
            {!! Form::text('to_sea', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Вид') !!}
            {!! Form::text('view', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Минимальная цена за 1 кв.м.') !!}
            {!! Form::text('min_price_m2', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Дата постройки') !!}
            {!! Form::date('builded', null , ['class'=> 'form-control']) !!}


        </div>
        <div id="commercial" style="display: none;">
            <h3>Характеристики коммерческой недвижимости:</h3>
            {!! Form::label('title', 'Этажей') !!}
            {!! Form::text('floors', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Этаж') !!}
            {!! Form::text('floor', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Общая площадь') !!}
            {!! Form::text('full_area', null , ['class'=> 'form-control']) !!}


        </div>
        <div id="flat" style="display: none;">
            <h3>Характеристики квартиры:</h3>
            {!! Form::label('title', 'Этажей') !!}
            {!! Form::text('floors', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Этаж') !!}
            {!! Form::text('floor', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Общая площадь') !!}
            {!! Form::text('full_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Жилая площадь') !!}
            {!! Form::text('living_area', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'До моря') !!}
            {!! Form::text('to_sea', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Вид') !!}
            {!! Form::text('view', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Комнат') !!}
            {!! Form::text('rooms', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Спален') !!}
            {!! Form::text('bedrooms', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Санузлов') !!}
            {!! Form::text('toilets', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Тип квартиры') !!}
            {!! Form::text('flat_type', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Высота потолков') !!}
            {!! Form::text('potolok', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Отопление') !!}
            {!! Form::text('heating', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Горячая вода') !!}
            {!! Form::text('hot_water', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Газ') !!}
            {!! Form::text('gas', null , ['class'=> 'form-control']) !!}
            {!! Form::label('title', 'Состояние') !!}
            {!! Form::text('condition', null , ['class'=> 'form-control']) !!}


        </div>
    </div>
    <div>
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
    {!! Form::label('title', 'Опубликовано') !!}
    {!! Form::hidden('published',0) !!}
    {!! Form::checkbox('published', 1, Input::old('published'), ['class' => 'field'])  !!}

    <br>
    {!! Form::label('title', 'Дата публикации') !!}
    {!! Form::input('date','published_at', date('Y-m-d') , ['class'=> 'form-control']) !!}

    <br>
    {!! Form::submit($buttonText, ['class'=>'btn btn-primary form-control' ]) !!}
</div>