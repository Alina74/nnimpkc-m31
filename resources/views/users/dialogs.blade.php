@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                @auth
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-10 mt-3">
                                <h3>Диалоги:</h3>
                                <div class="chat mt-2">
                                    @foreach($items as $item)
                                        <a class="btn card d-flex" href="{{route('chat.show', $item['friend'])}}" style="min-height: 80px; width: 900px">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <div class="col-md-4">
                                                    <img src="public/storage/{{$item['user']->photo}}" class="img-fluid" style="max-height: 80px">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h6  class="card-title">{{$item['user']->fullname}}</h6>
                                                        <p class="card-text">{{$item['message']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="auth">Вы не авторизированны.<a href="{{'login'}}">Авторизируйтесь</a></div>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
