<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <style>
        .card-body, .form-group {
            padding: 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
@extends('layouts.app')
@section('content')
    <form action="{{route('news.update',$news)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок:</label>
                <input type="text" name="title" value="{{$news->title}}" class="form-control" id="exampleInputEmail1">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Текст:</label>
                <input type="text" name="text" value="{{$news->text}}" class="form-control" id="exampleInputEmail1">
            </div>
        </div>
        <div class="card-body">
            <label for="exampleInputEmail1">Фото:</label>
            <input class="form-control" value="{{$news->image}}" type="file" name="image">
        </div>

        <div class="card-body">
            <label for="exampleInputEmail1">Категория:</label>
            <select id="exampleInputEmail1"class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-info">Изменить</button>
    </form>
@endsection
</body>
</html>
