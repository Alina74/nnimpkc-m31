@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="card mt-4">
                    <div class="card-header"><h4>{{DB::table('users')->where('id',$friend->friend_id)->first()->fullname}}</h4></div>
                    <div class="card-body text-center">
                        <img src="/public/storage/{{DB::table('users')->where('id',$friend->friend_id)->first()->photo}}" class="card-img-top w-50 mb-3">
                        <p class="card-text fs-5">Дата рождения: {{DB::table('users')->where('id',$friend->friend_id)->first()->birthday}}</p>
                        <p class="card-text">Увлечения: {{DB::table('users')->where('id',$friend->friend_id)->first()->hobbies}}</p>
                        <p class="card-text">Страна: {{DB::table('users')->where('id',$friend->friend_id)->first()->country}}</p>
                        <p class="card-text">Город: {{DB::table('users')->where('id',$friend->friend_id)->first()->city}}</p>
                        <p class="card-text">Возраст: {{\Carbon\Carbon::parse(DB::table('users')->where('id',$friend->friend_id)->first()->birthday)->age}}</p>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Удалить из друзей
                            </button>
                        <a href="{{route('chat.show', $friend->friend_id)}}" type="button" class="btn btn-secondary">
                            Написать сообщение
                        </a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удалить друга {{DB::table('users')->where('id',$friend->friend_id)->first()->fullname}}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить друга?<br>
                    {{DB::table('users')->where('id',$friend->friend_id)->first()->fullname}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{route('destroy', $friend->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Да</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
