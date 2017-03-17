<div id="flat">
    <h3>Характеристики квартиры:</h3>

    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
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
