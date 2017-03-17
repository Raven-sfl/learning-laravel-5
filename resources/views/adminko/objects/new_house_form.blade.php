<div id="new_house">
    <h3>Характеристики новостройки:</h3>
    <div class="col-md-6">
        {!! Form::label('title', 'Этажей') !!}
        {!! Form::text('floors', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Максимальная площадь') !!}
        {!! Form::text('max_area', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Минимальная площадь') !!}
        {!! Form::text('min_area', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'До моря') !!}
        {!! Form::text('to_sea', null , ['class'=> 'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('title', 'Вид') !!}
        {!! Form::text('view', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Минимальная цена за 1 кв.м.') !!}
        {!! Form::text('min_price_m2', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Дата постройки') !!}
        {!! Form::date('builded', null , ['class'=> 'form-control']) !!}
    </div>
</div>
