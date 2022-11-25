@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6 mt-3">
                <h3>Редактирование профиля</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">Аккаунт успешно отредактирован!</div>
                @endif
                    <form method="post" action="{{route('cabinetEdit')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputFullname" class="form-label">ФИО:</label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputFullname" aria-describedby="invalidFullnameFeedback" value="{{auth()->user()->fullname}}">
                            @error('fullname')
                            <div id="ValidationFullnameFeedback" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Страна проживания:</label>
                            <select name="country" id="inputSelect" class="form-select" aria-describedby="invalidInputRole">
                                <option @selected(Auth::user()->country=='Россия')>Россия</option>
                                <option @selected(Auth::user()->country=='Казахстан')>Казахстан</option>
                                <option @selected(Auth::user()->country=='Беларусь')>Беларусь</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Город проживания:</label>
                            <select name="city" id="inputSelect" class="form-select" aria-describedby="invalidInputRole" >
                                <option @selected(Auth::user()->city=='Челябинск')>Челябинск</option>
                                <option @selected(Auth::user()->city=='Москва')>Москва</option>
                                <option @selected(Auth::user()->city=='Волгоград')>Волгоград</option>
                                <option @selected(Auth::user()->city=='Минск')>Минск</option>
                                <option @selected(Auth::user()->city=='Брест')>Брест</option>
                                <option @selected(Auth::user()->city=='Гродно')>Гродно</option>
                                <option @selected(Auth::user()->city=='Астана')>Астана</option>
                                <option @selected(Auth::user()->city=='Алматы')>Алматы</option>
                                <option @selected(Auth::user()->city=='Актау')>Актау</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputSelect" class="input-group-text">Увлечения:</label>
                            <select name="hobbies" id="inputSelect" class="form-select" aria-describedby="invalidInputRole">
                                <option @selected(Auth::user()->hobbies=='Спорт')>Спорт</option>
                                <option @selected(Auth::user()->hobbies=='Кулинария')>Кулинария</option>
                                <option @selected(Auth::user()->hobbies=='Чтение')>Чтение</option>
                                <option @selected(Auth::user()->hobbies=='Танцы')>Танцы</option>
                                <option @selected(Auth::user()->hobbies=='Музыка')>Музыка</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input name="photo_file" class="form-control" type="file" id="inputFile" aria-describedby="invalidInputFile">
                        </div>
                        <div class="mb-3">
                            <label for="inputBirthday" class="form-label">Дата рождения:</label>
                            <input type="date" name="birthday" class="form-control" id="inputBirthday" aria-describedby="invalidBirthdayFeedback" value="{{old('birthday', auth()->user()->birthday)}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Логин:</label>
                            <input disabled type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="invalidLoginFeedback" value="{{auth()->user()->login}}">
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
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
