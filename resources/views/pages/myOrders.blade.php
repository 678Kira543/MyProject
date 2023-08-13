@extends('template')
@section('title', 'Мои заказы')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-12 text-left">
                    <div class="cart mb-4">
                        <div class="card-body">
                            <!-- Single item -->
                            @foreach($carts as $cart)
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="{{$cart->img1}}" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <h3><strong>{{$cart->name}}</strong></h3>
                                        <p class="my-0">{{$cart->author}}</p>
                                        <p class="my-0" id="total_{{$cart->id}}">{{$cart->cost * $cart->quantity}}₽</p>
                                        <h5>{{$cart->status}}</h5>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </section>
@endsection
