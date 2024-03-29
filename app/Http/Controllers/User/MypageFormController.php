<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kachi;
use App\Http\Requests\MypageRequest;
use App\Models\User;

class MypageFormController extends Controller
{
    public function __construct()
    {
        $this->kachi = new Kachi();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 認証している場合は、マイページcreateへ
        if(Auth::check()){
            return view('user.mypage.create');
        }
        // 認証していない場合、topへ
        return redirect()->route('top');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MypageRequest $request)
    {
        $this->kachi->insertKachi($request);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 認証している場合
        if(Auth::check()){
            $kachi = $this->kachi->find($id);
            $kachi_user_id = $kachi->user_id;
            $user_id = Auth::user()->id;
            // 認証している人が保有するkachi_idならばshow.bladeを表示
            if($kachi_user_id == $user_id){
                return view('user.mypage.edit', compact('kachi'));
            }
            return redirect()->route('user.index');
            }
        // 認証していない場合、topへ
        return redirect()->route('top');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MypageRequest $request, $id)
    {
        # データベースの更新
        $update_kachi = $this->kachi->find($id);
        $update_kachi->kachi = $request->kachi;
        $update_kachi->save();

        # indexへリダイレクト
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_kachi = $this->kachi->find($id);
        $destroy_kachi->delete();

         # indexへリダイレクト
         return redirect()->route('user.index');
    }
}
