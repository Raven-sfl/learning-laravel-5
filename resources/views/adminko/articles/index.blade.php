@extends('adminko.app')

@section('title')Статьи / Агентство недвижимости в Крыму - Top-City @stop
@section('description')Вы давно мечтаете купить дом в Ялте или в другом уголке Крыма? Мы поможем купить дом на ЮБК у моря недорого. Предлагаем виллы, коттеджи, дома в Гурзуфе и других городах большой Ялты. Большая база предложений с ценами в рублях, фото, и расположением на карте. @stop
@section('keywords')ялта, недвижимость, купить, дом, недорогой, частные, частный, у, моря @stop

@section('content')
    <h1>Редактирование статей</h1>

    <a href="/adminko/articles/create">
        <button class="btn btn-primary form-control">Добавить статью</button>
    </a>
    <hr>
    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <td style="width: 5%">ID</td>
            <td style="width: 45%">Название</td>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td style="font-weight: 400">{{$article->title}}</td>
                <td><a href="{{action('adminko\AdminArticlesController@edit', $article->id)}}">
                        <button class="btn btn-primary form-control">Редактировать</button>
                    </a></td>
                <td>
                    {!! Form::model($article, ['method'=>'DELETE','action'=>['adminko\AdminArticlesController@destroy', $article->id]]) !!}
                    {!! Form::submit('Удалить', ['class'=>'btn btn-primary form-control' ]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

