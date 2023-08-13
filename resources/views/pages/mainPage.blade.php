@extends('template')
@section('title', 'Главная станица')
@section('content')
    @foreach($products as $product)
        <!-- Post preview-->
        <div class="col mb-2 py-3 w-75">
            <div class="container w-auto h-100">
                <!-- Product image-->
                <img class="card-img w-100" src="{{$product->img1}}"/>
                <!-- Product details-->
                <div class="card-body p-2">
                    <div class="text-left">
                        <!-- Product name-->
                        <h2 class="">{{$product->title}}</h2>
                        <p>{{$product->cost}} ₽</p>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                    <div class="text-left"><a class="btn btn-success mt-auto" href="/product/{{$product->id}}">Открыть</a></div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
