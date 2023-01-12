<?php

namespace App\Http\Controllers\Discard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListRoom;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\DiscardListRequest;
use App\Models\Huyoubutu;

class DiscardController extends Controller
{

    public function __construct()
    {
        $this->listroom = new ListRoom();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 認証している場合は、マイページindexへ
        if(Auth::check()){
            # ログインユーザのインスタンスの作成
            $user = Auth::user();
            # ログインユーザのidを取得
            $id = Auth::id();
            $listrooms = User::find($id)->listrooms;
            if($user->id == $id){
                return view('user.discard.index', compact('listrooms'));
            }
        }
        // 認証していない場合、topへ
        return redirect()->route('top');
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
            return view('user.discard.create');
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
    public function store(DiscardListRequest $request)
    {
        $this->listroom->insertListRoom($request);
        return redirect()->route('discard_list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // 認証している場合
         if(Auth::check()){
            $list = $this->listroom->find($id);
            $list_user_id = $list->user_id;
            $user_id = Auth::user()->id;
            // 認証している人が保有するlist_user_idならばshow.bladeを表示
            if($list_user_id == $user_id){
                # huyoubutusからデータを取得
                $huyoubutus = Huyoubutu::where('listroom_id', '=', $id)->get();
                # list名の取得
                $list_name = $list->list_name;
                return view('user.discard.show', compact('huyoubutus', 'list_name'));
            }
            return redirect()->route('discard_list.index');
            }
        // 認証していない場合、topへ
        return redirect()->route('top');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_kachi = $this->listroom->find($id);
        $destroy_kachi->delete();

         # indexへリダイレクト
         return redirect()->route('discard_list.index');
    }
}
