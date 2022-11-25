@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h3>Мои друзья</h3>
                <div class="row mb-2 mt-3">
                    @if(count($friends)!==0)
                        @foreach($friends as $friend)
                            <div class="col-2 mt-2">
                                <div class="card w-100 h-100">
                                    <img height="150"  src="/public/storage/{{DB::table('users')->where('id',$friend->friend_id)->first()->photo}}" class="card-img-top">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title">{{DB::table('users')->where('id',$friend->friend_id)->first()->fullname}}</h5>
                                        <p class="card-text">{{DB::table('users')->where('id',$friend->friend_id)->first()->birthday}}</p>
                                        <a href="{{route('friend', ['friend'=>$friend->friend_id])}}" class="btn cardbtn btn-secondary"><small>Смотреть страницу</small></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>У вас нет друзей :(</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
