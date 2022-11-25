@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6 mt-3">
                <h3>Мой личный кабинет</h3>
                <div class="card mb-3 mt-3 d-flex">
                    <div class="row g-0 d-flex align-items-center">
                        <div class="col">
                            <img src="/public/storage/{{\Illuminate\Support\Facades\Auth::user()->photo}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->fullname}}</h5>
                                <p class="card-text">Логин: {{\Illuminate\Support\Facades\Auth::user()->login}}</p>
                                <p class="card-text">Дата рождения: {{\Illuminate\Support\Facades\Auth::user()->birthday}}</p>
                                <p class="card-text">Возраст: {{\Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->birthday)->age}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('cabinetEdit')}}" class="btn btn-outline-secondary w-100"><small>Редактировать аккаунт</small></a>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
