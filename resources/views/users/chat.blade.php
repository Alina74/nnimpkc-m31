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
                                <h3>Чат с пользователем {{$chat->fullname}}</h3>
                                <div class="chat mt-4">
                                    @foreach($messages as $message)
                                        <div class="dialog">
                                            <div class="icon">
                                                <p><img height="50px" class="rounded-2" style="margin-right: 10px" src="/public/storage/{{$message->user->photo}}">{{$message->user->fullname}}</p>
                                            </div>
                                            <div class="text d-flex align-items-center justify-content-between">
                                                <p>{{$message->message}}</p><small><b>{{$message->created_at}}</b></small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <form class="d-flex gap-2" method="POST" action="{{route('newMessage', $chat->id)}}">
                                    @csrf
                                    <div class="mb-3 w-100">
                                        <input type="text" name="message" class="form-control @error('message') is-invalid @enderror" id="inputMessage" aria-describedby="invalidMessageFeedback">
                                        @error('message')<div id="invalidMessageFeedback" class="invalid-feedback">{{$message}}</div>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-secondary h-75">Отправить</button>
                                </form>
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
