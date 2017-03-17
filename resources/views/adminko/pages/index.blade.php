@extends('adminko.app')


@section('content')
    <h1>Страницы</h1>
    <a href="{{action('adminko\AdminPagesController@create')}}">
        <button class="btn btn-primary form-control">Создать страницу</button>
    </a>
    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <td style="width: 5%">Имя</td>
            <td style="width: 5%">Ссылка</td>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
        </tr>
        </thead>
        <tbody>
        @if(! empty($pages))
            @foreach($pages as $page)
                <tr>

                    <td style="font-weight: 400">{{$page->title}}</td>
                    <td style="font-weight: 400">{{$page->slug}}</td>
                    <td><a href="{{action('adminko\AdminPagesController@edit', ['id'=>$page->id])}}">
                            <button class="btn btn-primary">Редактировать</button>
                        </a></td>
                    <td>
                        {!! Form::model($page, ['method'=>'DELETE','action'=>['adminko\AdminPagesController@destroy', $page->id]]) !!}
                        {!! Form::submit('Удалить', ['class'=>'btn btn-primary' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop

