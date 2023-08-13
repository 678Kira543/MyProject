@extends('template')
@section('title', 'Управление товарами')
@section('content')
    <section>
        <div class="container-fluid">
            <a class="btn btn-outline-dark bi bi-shield-plus my-3" href='/addProduct'> Добавить товар</a>
            <div class="row d-flex justify-content-center">
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
                                        <select onchange="changeStatus(this)" data-cart-id="{{$cart->id}}" class="my-2">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}" @if($status->id == $cart->status) selected @endif>{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="my-0">{{$cart->author}}</p>
                                        <p class="my-0" id="total_{{$cart->id}}">{{$cart->cost * $cart->quantity}}₽</p>
                                        <p class="my-0"><a class="fw-bold text-dark" style="color:black; text-decoration: none">ID покупателя: {{$cart->user_id}}</a></p>
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
    <script>
        let statusSelector = document.getElementById('statusSelector');
        let csrf = document.getElementsByName('_token')[0].value;
        function changeStatus(statusSelector){
            let status = (statusSelector.value);
            let cartId = statusSelector.dataset.cartId;
            let formData = new FormData();
            formData.append("_token", csrf);
            formData.append("cartId", cartId);
            formData.append("status", status);
            fetch('/changeStatus', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    console.log(result);
                });
        }
        statusSelector.onchange = function (){

        }
    </script>
@endsection
