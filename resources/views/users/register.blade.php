@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6 mt-3">
                <h3>Регистрация нового пользователя</h3>
                @auth
                    <div class="alert alert-primary">Вы уже авторизованы. Регистрация не возможна!</div>
                @endauth
                @guest
                    <form method="post" action="{{route('register')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="inputFullname" class="form-label">ФИО:</label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputFullname" aria-describedby="invalidFullnameFeedback" value="{{old('fullname')}}">
                            @error('fullname')
                            <div id="ValidationFullnameFeedback" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Страна проживания:</label>
                            <select name="country" id="inputSelect" class="form-select" aria-describedby="invalidInputRole">
                                <option @selected(old('country') == 'Россия')>Россия</option>
                                <option @selected(old('country') == 'Казахстан')>Казахстан</option>
                                <option @selected(old('country') == 'Беларусь')>Беларусь</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Город проживания:</label>
                            <select name="city" id="inputSelect" class="form-select" aria-describedby="invalidInputRole">
                                <option @selected(old('city') == 'Челябинск')>Челябинск</option>
                                <option @selected(old('city') == 'Москва')>Москва</option>
                                <option @selected(old('city') == 'Волгоград')>Волгоград</option>
                                <option @selected(old('city') == 'Минск')>Минск</option>
                                <option @selected(old('city') == 'Брест')>Брест</option>
                                <option @selected(old('city') == 'Гродно')>Гродно</option>
                                <option @selected(old('city') == 'Астана')>Астана</option>
                                <option @selected(old('city') == 'Алматы')>Алматы</option>
                                <option @selected(old('city') == 'Актау')>Актау</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Увлечения:</label>
                            <select name="hobbies" id="inputSelect" class="form-select" aria-describedby="invalidInputRole">
                                <option @selected(old('hobbies') == 'Спорт')>Спорт</option>
                                <option @selected(old('hobbies') == 'Кулинария')>Кулинария</option>
                                <option @selected(old('hobbies') == 'Чтение')>Чтение</option>
                                <option @selected(old('hobbies') == 'Танцы')>Танцы</option>
                                <option @selected(old('hobbies') == 'Музыка')>Музыка</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputBirthday" class="form-label">Дата рождения:</label>
                            <input type="date" name="birthday" class="form-control" id="inputBirthday" aria-describedby="invalidBirthdayFeedback" value="{{old('birthday')}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Логин:</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="invalidLoginFeedback" value="{{old('login')}}">
                            @error('login')
                            <div id="ValidationLoginFeedback" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password')
                            <div id="ValidationPasswordFeedback" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirmation" class="form-label">Повтор пароля:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPasswordConfirmation" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="ValidationPasswordFeedback" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary">Регистрация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
