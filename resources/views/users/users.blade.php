@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h3>Пользователи</h3>
                @include('users.search')
                <div class="row mb-2 mt-4">
                @if(count($users)!==0)
                    @foreach($users as $user)
                        <div class="col-2 mt-2">
                            <div class="card w-100 h-100">
                                <img height="150" src="/public/storage/{{$user->photo}}" class="card-img-top">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title">{{$user->fullname}}</h5>
                                    <p class="card-text">{{$user->birthday}}</p>
                                    <p class="card-text">{{$user->country}}</p>
                                    <p class="card-text">{{$user->city}}</p>
                                    <p class="card-text">{{$user->hobbies}}</p>
                                    <a href="{{route('addFriend',$user->id)}}" class="btn btn-secondary"><small>Добавить в друзья</small></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Людей с такими данными не найдено</p>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
