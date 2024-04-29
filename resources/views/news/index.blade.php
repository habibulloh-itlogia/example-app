@extends('layouts.app')
@section('title')
    <h3>Таблица новостей</h3>
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Заголовок</th>
            <th>фото</th>
            <th>Категория</th>
            <th>Когда создано</th>
            <th>Когда изменено</th>
            <th>Удалить</th>
            <th>Изменить</th>
            <th>Показ</th>
        </tr>
        @foreach($all_news as $news)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$news->title}}</td>
                <td>
                    <img src="{{asset('images/news/'.$news->image)}}"width="100" alt="">
                </td>
                <td>{{$news->category->name}}</td>
                <td>{{$news->created_at}}</td>
                <td>{{$news->updated_at}}</td>
                <td>
                    <form action="{{route('news.destroy', $news->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('news.edit', $news->id)}}" method="get">
                        @csrf
                        <input type="submit" value="Изменить" class="btn btn-info">
                    </form>
                </td>
                <td>
                    <form action="{{route('news.show', $news->id)}}" method="get">
                        @csrf
                        <input type="submit" value="Показ" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
