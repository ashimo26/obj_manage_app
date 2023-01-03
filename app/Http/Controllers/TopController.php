<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TopController extends Controller
{
    public function top()
    {
        // 認証している場合は、マイページindexへ飛ぶ
        if(Auth::check()){
            $user = Auth::user();
            return redirect()->route('user.index', [$user]);
        }
        // 認証していない場合は、homeへ
        return view('top');
    }
        
}
