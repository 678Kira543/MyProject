@extends('template')
@section('title', 'Профиль')
@section('content')
    <title>Профиль</title>
    <div class="row col-md-8 mt-3 bg-success">
        <div class="col-sm-8 my-3">
            <p class="text-white">
                <strong>Имя: </strong> <span id="nameSpan">{{$user->name}}</span>
            </p>
            <p class="text-white">
                <strong>Фамилия: </strong> <span>{{$user->lastname}}</span>
            </p>
            <p class="text-white">
                <strong>E-mail: </strong> <span>{{$user->email}}</span>
            </p>
            <p class="text-white">
                <strong>ID: </strong> <span>{{$user->id}}</span>
            </p>
        </div>
    </div>
@endsection
