<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class FriendController extends Controller
{
    public function index(){
        $id = auth()->id();
        $data = $this->listFriends($id);
        return $data;
    }

    public function show($email){
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Email không hợp lệ!'], 400);
        }

        $user = User::where('email',$email)->first();


        $role = Role::find(2);

        if(!Gate::forUser($user)->allows('roles',$role)){
            $user->load('profile');
        }

        if($user){
            return response()->json([
                'data' => $user,
                'message' => 'Lấy tài khoản thành công!',
            ],200);
        }
        return response()->json([
            'message' => 'Tài khoản không tồn tại!',
        ],404);
    }

    public function store(Request $request){
        $users = $request->input('users');
        $message = $request->input('message');
        $data = array_map(function($user){
            return $user->id;
        },$users);
        return response()->json($data);
    }

    public function update($id,Request $request){

    }

    public function destroy($id){

    }

    public function listFriends($id){
        $friends = Friend::where(function($query) use ($id) {
            $query->where('from_id',$id)->orWhere('to_id',$id);
        })->where('status',0)->get();
        $role = Role::find(2);
        $data = $friends->map(function($friend) use ($id,$role) {
            $idUser = $friend->from_id == $id ? $friend->to_id : $friend->from_id;
            $us = User::find($idUser);

            $lastMessage = Message::where(function($query) use ($id, $idUser) {
                $query->where('from_id', $id)->where('to_id', $idUser)
                    ->orWhere('from_id', $idUser)->where('to_id', $id);
            })->latest()->first();

            $us->setAttribute('last_message', $lastMessage);

            if(!Gate::forUser($us)->allows('roles',$role)){
                return $us->load('profile');
            }else{
                return $us;
            }
        });
        return $data;
    }


}
