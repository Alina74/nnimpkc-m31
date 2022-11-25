<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserValidation;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Models\Chat;
use App\Models\Dialog;
use App\Models\FriendUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * форма авторизации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('users.login');
    }

    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return back()->with(['success'=>'true']);
        }
        return back()->withErrors(['auth'=>'Логин или пароль не верный']);
    }

    public function register()
    {
        return view('users.register');
    }

    public function registerPost(RegisterValidation $request)
    {
        $requests=$request->validated();
        $requests['password']=Hash::make($requests['password']);
        User::create($requests);
        return redirect()->route('login')->with(['register'=>true]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }

    public function cabinet()
    {
        return view('users.cabinet');
    }

    public function cabinetEdit()
    {
        return view('users.edit');
    }
    public function cabinetEditPost(EditUserValidation $request)
    {
        $validate=$request->validated();
        if (isset($validate['password']))
            $validate['password']=Hash::make($validate['password']);
        else unset($validate['password']);
        unset($validate['photo_file']);
        if ($request->hasFile('photo_file')){
            $photo=$request->file('photo_file')->store('public');
            $validate['photo']=explode('/', $photo)[1];
        }
        $user=Auth::user();
        $user->update($validate);
        return back()->with(['success'=>true]);
    }

    public function allusers()
    {
        $users=User::all();
        return view('users.users', compact('users'));
    }
    public function search(Request $request)
    {
        $search=$request['name'];
        $users = User::where('fullname','LIKE', "%{$search}%")->orderBy('fullname')->get();
        return view('users.users', compact('users'));
    }

    public function addFriend(User $friend)
    {
        auth()->user()->friends()->updateOrCreate([
            'user_id'=>auth()->id(),
            'friend_id'=>$friend->id
        ],[
            'status'=>'nan'
        ]);
        return back();
    }

    public function friends()
    {
        $friends=DB::table('friend_users')->where('user_id',Auth::id())->get();

        return view('users.friends', compact('friends'));
    }

    public function friend($f)
    {
        $friend = DB::table('friend_users')->where('friend_id',$f)->first();
        return view('users.friend', compact('friend'));
    }

    public function destroy($friend)
    {
        DB::table('friend_users')->where('id',$friend)->delete();
        return redirect()->route('friends');

    }



}
