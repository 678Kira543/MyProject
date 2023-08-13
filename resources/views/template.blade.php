<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="mx-2 btn btn-dark">CARE FACE</a>
            <a class="mx-2 btn btn-outline-dark bi bi-shield-lock" href='/dashboard'></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/mainPage">Главная</a>
                    </li>

                </ul>
                <span onclick="location.href='/cart'" class="btn btn-outline-success bi bi-basket mt-1 mx-1"></span>
                <span onclick="location.href='/myOrders'" class="btn btn-outline-success bi bi-truck mt-1 mx-1"></span>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn-outline-dark bi bi-person mt-1 mx-2" aria-current="page" href="/profile"> Профиль</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark bi bi-box-arrow-right mt-1 mx-1" href="#" onclick="logoutForm.submit()"></a></li>
                    <form id="logoutForm" action="/logout" method="post">
                        @csrf
                    </form>
                </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- main content -->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
