<?php

namespace App\Http\Controllers\Buy;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\List_Buy;
use App\Models\User;
use App\Models\Wantbuy;
use App\Http\Requests\WantBuyListRequest;

class BuyController extends Controller
{
    public function __construct()
    {
        $this->listbuy = new List_Buy();
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
            # 子テーブルデータの取得
            $listbuys = $this->listbuy->getCounthuyoubutus($id);
            # deleteした件数の取得
            $wantbuy_count = User::find($id)->wantbuys->where('delete_status', '=', 1)->count();
            if($user->id == $id){
                return view('user.wantbuy.index', compact('listbuys','wantbuy_count'));
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
            return view('user.wantbuy.create');
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
    public function store(WantBuyListRequest $request)
    {
        $this->listbuy->insertListBuy($request);
        return redirect()->route('buy_list.index');
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
            $list = $this->listbuy->find($id);
            $list_user_id = $list->user_id;
            $user_id = Auth::user()->id;
            // 認証している人が保有するlist_user_idならばshow.bladeを表示
            if($list_user_id == $user_id){
                # wantbuyからデータを取得
                $wantbuys = Wantbuy::with('kachi')->where('list_buy_id', '=', $id)->get();
                # list名の取得
                $list_name = $list->list_name;
                return view('user.wantbuy.show', compact('wantbuys', 'list_name'));
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
        //
    }

    public function buy()
    {

    }
}
