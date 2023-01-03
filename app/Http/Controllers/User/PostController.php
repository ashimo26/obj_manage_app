<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // 認証している場合は、マイページindexへ
        if(Auth::check()){
            # ログインユーザのインスタンスの作成
            $user = Auth::user();
            # ログインユーザのidを取得
            $id = Auth::id();
            $kachis = User::find($id)->kachis;
            if($user->id == $id){
                return view('user.list.index', compact('kachis'));
            }
        }
        // 認証していない場合、topへ
        return redirect()->route('top');
    }
}
