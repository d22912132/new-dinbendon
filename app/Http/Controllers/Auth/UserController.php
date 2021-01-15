<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function modifyUser(){
        //hint=0代表不需顯示任何提示資訊在網頁中
        return view('auth.modify-user', ['hint' => '0']);
    }
    //修改一筆會員資料
    public function modifyUserData(Request $data){
        $user = User::findOrFail($data['id']);
        //如果輸入密碼不等於該帳號密碼，返回登入修改介面並指定hint為2，代表顯示密碼錯誤
        if(!(Hash::check($data['password'], $user->password)))
            return view('auth.modify-user', ['hint' => '2']);
        //密碼正確，使用傳入的資料$data進行會員資料更新並指定hint為1，代表修改完成
        else{
            $update_data = [
                'name' => $data['name'],
                'sex' => $data['sex'],
                'telephone' => $data['telephone'],
                'birthday' => $data['birthday'],
                'memo' => $data['memo'],
            ];
            //直接更新使用update
            $user->update($update_data);
        }
        return view('auth.modify-user',['hint' => '1']);
    }

    public function modifyUserPwd(){
        //hint=0代表不需顯示任何提示資訊在網頁中
        return view('auth.modify-pwd', ['hint' => '0']);
    }
    //修改一筆會員密碼
    public function modifyUserPwdData(Request $data){
        $user = User::findOrFail($data['id']);
        //如果輸入密碼不等於該帳號密碼，返回登入修改介面並指定hint為2，代表顯示密碼錯誤
        if(!(Hash::check($data['password-old'], $user->password)))
            return view('auth.modify-pwd', ['hint' => '2']);
        else{
            if($data['password-new'] === $data['password-conf']){
                $update_data = [
                    'password' => Hash::make($data['password-new']),
                ];
                $user->update($update_data);
                return view('auth.modify-pwd',['hint' => '1']);
            }
            else{
                //hint3表示確認密碼不符
                return view('auth.modify-pwd',['hint' => '3']);
            }
        }
    }
    
    public function deleteUser(){
        //hint=0代表不需顯示任何提示資訊在網頁中
        return view('auth.delete-user',['hint' => '0']);
    }
    //刪除一筆會員資料
    public function deleteUserData(Request $data){
        $user = User::findOrFail($data['id']);
        if(!(Hash::check($data['password'], $user->password)))
            return view('auth.delete-user', ['hint' => '2']);
        else{
            $user->delete();
            return view('auth.delete-user',['hint' => '1']);
        }
    }
}
