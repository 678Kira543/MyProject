@extends('template')
@section('title', 'Добавление товара')
@section('content')
    <h1 class="text-center my-3">Добавление товара</h1>
    <div class="col-sm-8 mx-auto">
        <form action="/addProduct" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="img1" class="form-control" placeholder="Изображение 1">
            </div>
            <div class="mb-3">
                <input type="text" name="img2" class="form-control" placeholder="Изображение 2">
            </div>
            <div class="mb-3">
                <input type="text" name="img3" class="form-control" placeholder="Изображение 3">
            </div>
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Название">
            </div>
            <div class="mb-3">
                <input type="text" name="author" class="form-control" placeholder="Производитель">
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Описание"></textarea>
            </div>
            <div class="mb-3">
                <input type="number" name="cost" class="form-control" placeholder="Стоимость">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success form-control mt-3" placeholder="Добавить товар">
            </div>
        </form>
    </div>
@endsection
