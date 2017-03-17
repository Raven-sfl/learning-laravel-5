<div class="form-group">


    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'Алиас') !!}
    {!! Form::text('slug', null , ['class'=> 'form-control']) !!}
    {!! Form::label('title', 'Краткое содержание') !!}
    {!! Form::textarea('excerpt', null , ['class'=> 'form-control', 'id'=>'editor1']) !!}
    {!! Form::label('title', 'Текст') !!}
    {!! Form::textarea('body', null , ['class'=> 'form-control', 'id'=>'editor2']) !!}
    {!! Form::label('title', 'Изображение превью') !!}<br>
    @if(!empty($articles->preview_img))
        <input type="hidden" id="item_id" value="{{$articles->id}}"/>
        <div class="img-thumbnail">
            <img width=100 src="{{$articles->preview_img}}">
            <button type="button" title="Удалить" class="btn btn-danger del_image btn-xs"><i
                        class="glyphicon glyphicon-minus"></i></button>
        </div>
    @endif
    <hr>
    {!! Form::file('preview_img', null , ['class'=> 'form-control']) !!}
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