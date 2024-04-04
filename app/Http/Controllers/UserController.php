<?php

namespace App\Http\Controllers;

use App\Events\ToggleMessage;
use App\Http\Controllers\CRUD\MessageController;
use App\Models\Message;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changeStatus(Request $request){
        try {
            $user = User::findOr($request->id);
            $user->update([
                'is_online' => $request->data
            ]);
            response()->json([
                'message' => 'Sửa trạng thái thành công',
            ],200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function setMessage(Request $request){
        $id = $request->user['id'];
        Message::where('to_id', $id)->where('seen', 0)->update(['seen' => 1]);
    }

    public function updateProfile(Request $request){
        $profile = auth()->user()->profile;
        $data = [
            'name' => $request->input('fullname'),
        ];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload($file->getRealPath(),[
              'folder' => 'avatar-user'
            ]);
            $url = $upload->getSecurePath();
            $data['avatar'] = $url;
        }
        auth()->user()->update($data);
        $dataProfile = [
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
        ];
        if($profile){
            $profile->update($dataProfile);
        }else{
            $profile->create($dataProfile);
        }
        return response()->json($request->all());
    }

    public function updateSocials(Request $request){

        $data = $request->all();
        $result = collect($data)->map(function ($item,$key) {
            return ['links' => $item ?? ''];
        });
        auth()->user()->socials()->sync($result);
        return response()->json([
            'message' => 'update success'
        ],200);
    }
}
