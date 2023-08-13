@extends('template')
@section('content')
    <title>Корзина</title>
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
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <h3><strong>{{$cart->name}}</strong></h3>
                                        <p>{{$cart->author}}</p>
                                        <p>{{$cart->cost}}₽</p>
                                    </div>

                                    <div class="col">
                                        <button class="btn btn-outline-success bi bi-dash" onclick="changeQuantity('minus', this)"></button>
                                        <span class="h4 mx-3" data-cost="{{$cart->cost}}">{{$cart->quantity}}</span>
                                        <button class="btn btn-outline-success bi bi-plus" onclick="changeQuantity('plus', this)"></button>
                                    </div>
                                        <!-- Price -->

                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="sm-2">Сумма:</h3>
                            <h5>{{$cart->cost}}₽</h5>
                            <button type="button" class="btn btn-success btn-lg my-2">
                                Оплатить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
    </div>
    </section>
    <script>
        function changeQuantity(action, btn){
            let quantity;
            if(action === 'plus'){
                quantity = btn.previousElementSibling;
                quantity.innerText = +quantity.innerText + 1;
            }else{
                quantity = btn.nextElementSibling;
                if(quantity.innerText <= '1') return;
                quantity.innerText = +quantity.innerText - 1;
            }
            let total = quantity.dataset.cost * quantity.innerText;
            console.log(total);
        }
    </script>
@endsection
