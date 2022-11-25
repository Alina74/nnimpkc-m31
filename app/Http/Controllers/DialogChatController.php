<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageValidation;
use App\Models\Chat;
use App\Models\Dialog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DialogChatController extends Controller
{
    public function dialogs()
    {
        $items = [];
        $dialogs = Dialog::orWhere(function($query) {
            $query->where('user_id', Auth::id());
        })->orWhere(function($queryTo){
            $queryTo->where('friend_id',Auth::id());
        })->orderBy('created_at')->get();
        foreach ($dialogs as $dialog){
            $chat = Chat::orWhere(function($query) use ($dialog) {
                $query->where('dialog_id', $dialog->id);
            })->orderBy('created_at','desc')->first();
            if($dialog->user_id == Auth::user()->id){
                $items[] =[
                    'id' => $dialog->id,
                    'message' => $chat->message,
                    'user' => $chat->user,
                    'friend' => $dialog->friend_id
                ];
            }
            else{
                $items[] =[
                    'id' => $dialog->id,
                    'message' => $chat->message,
                    'user' => $chat->user,
                    'friend' => $dialog->user_id
                ];
            }
        }
        return view('users.dialogs', compact('items'));
    }

    public function send(MessageValidation $request, $friend)
    {
        $dialog = Dialog::orWhere(function($query) use ($friend) {
            $query->where('user_id', Auth::id())->where('friend_id',$friend);
        })->orWhere(function($queryTo) use ($friend){
            $queryTo->where('user_id', $friend)->where('friend_id',Auth::id());
        })->orderBy('created_at')->first();
        if($dialog != NULL){
            $requests = $request->validated();
            $requests['user_id'] = Auth::id();
            $requests['dialog_id'] = $dialog->id;
            Chat::create($requests);
            return back();
        }
        else{
            $value = [];
            $value['user_id'] = Auth::id();
            $value['friend_id'] = $friend;
            Dialog::create($value);
            $newDialog = Dialog::orWhere(function($query) use ($friend) {
                $query->where('user_id', Auth::id())->where('friend_id',$friend);
            })->orWhere(function($queryTo) use ($friend){
                $queryTo->where('user_id', $friend)->where('friend_id',Auth::id());
            })->orderBy('created_at')->first();
            $requests = $request->validated();
            $requests['user_id'] = Auth::id();
            $requests['dialog_id'] = $newDialog->id;
            Chat::create($requests);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $chat)
    {
        $dialog = Dialog::orWhere(function($query) use ($chat) {
            $query->where('user_id', Auth::id())->where('friend_id',$chat->id);
        })->orWhere(function($queryTo) use ($chat){
            $queryTo->where('user_id', $chat->id)->where('friend_id',Auth::id());
        })->orderBy('created_at')->first();
        if($dialog != NULL){
            $messages = Chat::where(function($query) use ($dialog) {
                $query->where('dialog_id', $dialog->id);
            })->orderBy('created_at')->get();
            return view('users.chat',compact('messages', 'chat'));
        }
        else{
            $messages = Chat::orWhere(function($query) use ($chat) {
                $query->where('user_id', Auth::id())->where('user_id',$chat->id);
            })->orWhere(function($queryTo) use ($chat){
                $queryTo->where('user_id', $chat->id)->where('user_id',Auth::id());
            })->orderBy('created_at')->get();
            return view('users.chat',compact('chat', 'messages'));
        }
    }
}
