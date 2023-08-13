@extends('template')
@section('title', 'Авторизация')
@section('content')
    <title>Авторизация</title>
    <h1 class="text-center my-3">Авторизация</h1>
<div class="col-sm-8 mx-auto">
    @if($errors->any())
        <div>
            @foreach($errors->all() as $errors)
                <ul>
                    <li>{{$errors}}</li>
                    @endforeach
                </ul>
        </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Пароль">
        </div>

        <div class="mb-3">
            <input type="submit" value="Авторизоваться" class="btn btn-success form-control">
        </div>
        <p>Нет аккаунта? <a class="fw-bold text-dark"  style="text-decoration: none" href="/register">Зарегистрируйтесь</a></p>
    </form>
</div>
</div>
@endsection
