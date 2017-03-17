<div id="house">
    <h3>Характеристики дома: </h3>
    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">

        {!! Form::label('title', 'Назначение участка') !!}
        {!! Form::text('land_appointment', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Форма собственности') !!}
        {!! Form::text('ownership_type', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Комнат') !!}
        {!! Form::text('rooms', null , ['class'=> 'form-control']) !!}
        {!! Form::label('title', 'Спален') !!}
        {!! Form::text('bedrooms', null , ['class'=> 'form-control']) !!}
    </div>
</div>

