@extends('template')
@section('title', 'Профиль')
@section('content')
    <div class="container my-2">
        <div class="row gx-4 gx-lg-5 justify-content-left">
            <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="mt-2">
            <p class="text-dark">
                <strong>Имя: </strong> <span id="nameSpan">{{$user->name}}</span>
            </p>
            <p class="text-dark">
                <strong>Фамилия: </strong> <span>{{$user->lastname}}</span>
            </p>
            <p class="text-dark">
                <strong>E-mail: </strong> <span>{{$user->email}}</span>
            </p>
            <p class="text-dark">
                <strong>ID: </strong> <span>{{$user->id}}</span>
            </p>
            <a class="btn btn-outline-success bi bi-box-arrow-right mt-1" href="#" onclick="logoutForm.submit()"> Выйти</a>
        </div>
            </div>
        </div>
    </div>
@endsection
