<div class="form-group">


    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'Алиас') !!}
    {!! Form::text('slug', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'Текст') !!}
    {!! Form::textarea('content', null , ['class'=> 'form-control', 'id'=>'editor1']) !!}
    <p>Метатеги</p>
    {!! Form::label('title', 'title') !!}
    {!! Form::text('meta_title', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'description') !!}
    {!! Form::text('meta_description', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'keywords') !!}
    {!! Form::text('meta_keywords', null , ['class'=> 'form-control']) !!}
</div>
{!! Form::label('title', 'Опубликовано') !!}
{!! Form::hidden('published',0) !!}
{!! Form::checkbox('published', 1, \Illuminate\Support\Facades\Input::old('published'), ['class' => 'field'])  !!}

<br>
{!! Form::label('title', 'Дата публикации') !!}
{!! Form::input('date','published_at', date('Y-m-d') , ['class'=> 'form-control']) !!}

<br>
{!! Form::submit($buttonText, ['class'=>'btn btn-primary form-control' ]) !!}
</div>