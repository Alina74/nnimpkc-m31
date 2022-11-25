<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social Bubble</title>
    <link rel="stylesheet" href="/public/assets/css/bootstrap.css">
    <script src="/public/assets/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Social Bubble</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="/">Главная</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('login')}}">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('register')}}">Регистрация</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('allusers')}}">Поиск друзей</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('friends')}}">Мои друзья</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('dialogs')}}">Сообщения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('cabinet')}}">Личный кабинет</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="{{route('logout')}}">Выход</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
