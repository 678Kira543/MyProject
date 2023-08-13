@extends('template')
@section('title', $product->title.' от '.$product->author)
@section('content')
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="card-img w-70" src="{{$product->img1}}"/>
            </div>
            <div class="carousel-item">
                <img class="card-img w-70" src="{{$product->img2}}"/>
            </div>
            <div class="carousel-item">
                <img class="card-img w-70" src="{{$product->img3}}"/>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
    </div>
        <h2 class="my-2">{{$product->title}}</h2>
    <span onclick="location.href='/addProductInCart/{{$product->id}}'" class="bi bi-basket btn btn-outline-success mt-auto"></span>
    <hr>
        <p>{{$product->cost}}₽</p>
    <p>{{$product->author}}</p>
    @auth
        <p>{{$product->description}}</p>
        <hr>
        <h4>Отзывы</h4>
        <div>
            <form action="/addReview" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div clas="mb-3">
                    <textarea name="review" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-success my-2" value="Добавить отзыв">
                </div>
            </form>
        </div>
    @else
        <div>Добавить отзыв может только авторизованный пользователь</div>
    @endauth
    <div class="my-3">
        @foreach($reviews as $review)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">{{$review->user_id}}</div>
                        @if($isAdmin or auth()->user()->getAuthIdentifier() == $review->user_id)
                            <div class="col-6 text-end">
                                <a class="btn-sm bi bi-x-lg btn btn-outline-dark" href ="/deleteReview/{{$review->id}}"></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text m-0">
                        {{$review->review}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection


