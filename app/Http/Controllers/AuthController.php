<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {   
        $credentials = $request->only([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    //ユーザー情報が見つかったらログイン
    if (Auth::guard('admins')->attempt($credentials)) {
        //ログイン後に表示するページにリダイレクト
        return redirect()->route('admin.dashboard')->with([
        'login_msg' => 'ログインしました。',
        ]);
    }

      //ログインできなかったときに元のページに戻る
        return back()->withErrors([
        'login' => ['ログインに失敗しました'],
        ]);
    }
}
