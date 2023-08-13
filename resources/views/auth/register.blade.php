@extends('template')
@section('title', 'Регистрация')
@section('content')
    <title>Регистрация</title>
    <h1 class="text-center">Регистрация</h1>
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
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Имя">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="lastname" placeholder="Фамилия">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля">
            </div>
            <div class="mb-3">
                <input type="submit" value="Зарегистрироваться" class="btn btn-success form-control">
            </div>
            <p>Есть аккаунт? <a class="fw-bold text-dark" style="text-decoration: none" href="/login">Авторизуйтесь</a></p>
        </form>
    </div>
@endsection
