<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="mx-3 btn btn-dark">CARE FACE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/mainPage">Главная</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Меню
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item" href="#" onclick="logoutForm.submit()">Выход</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Меню
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/register">Регистрация</a></li>
                            <li><a class="dropdown-item" href="/login">Вход</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
                <a href="/cart" class="bi bi-basket btn btn-outline-success mx-2">  Корзина</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-success" aria-current="page" href="/profile">Профиль</a>
                    </li>
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
