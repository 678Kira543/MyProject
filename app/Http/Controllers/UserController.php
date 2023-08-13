<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UserController extends Controller {
    public function updateUserData(Request $request){
        $name = $request->nameSpan;
        $lastname = $request->lastnameSpan;
        $userID = auth()->user()->getAuthIdentifier();
        $user = \App\Models\User::where('id', $userID)->first();
        if (!empty($name)){
            $user->name = $name;
        }elseif (!empty($lastname)){
            $user->lastname = $lastname;
        }
        $user->save();
        return json_encode(['result'=>'success']);
    }
    public function showProfile(){
        $user = auth()->user();
        return view('pages.profile', ['user'=>$user]);
    }
}
