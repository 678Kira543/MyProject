@extends('template')
@section('title', 'Добавление товара')
@section('content')
    <title>Добавление товара</title>
    <h1 class="text-center my-3">Добавление товара</h1>
    <div class="col-sm-8 mx-auto">
        @csrf
        <form action="/addProduct" method="post">
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Название">
            </div>
            <div class="mb-3">
                <input type="text" name="produce" class="form-control" placeholder="Производитель">
            </div>
            <div class="mb-3">
                <input type="text" name="description" class="form-control" placeholder="Описание">
            </div>
            <div class="mb-3">
                <input type="text" name="cost" class="form-control" placeholder="Стоимость">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success form-control mt-3" placeholder="Добавить товар">
            </div>
        </form>
    </div>
@endsection
