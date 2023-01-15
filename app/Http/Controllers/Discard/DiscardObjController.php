<?php

namespace App\Http\Controllers\Discard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscardRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\ListRoom;
use App\Models\Kachi;
use App\Models\Huyoubutu;

class DiscardObjController extends Controller
{
    public function __construct()
    {
        $this->listroom = new ListRoom();
        $this->kachi = new Kachi();
        $this->huyoubutu = new Huyoubutu();
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
    public function create($listname)
    {
        // 認証している場合は、マイページcreateへ
        if(Auth::check()){
            $listroom_obj = $this->listroom->getListRoomObj($listname);
            if($listroom_obj == FALSE){
                return redirect()->route('user.index');
            }
            $listroom_id = $listroom_obj->id;
            $kachis = $this->kachi->allDataGet();
            return view('user.discardobj.create', compact('listroom_id', 'kachis'));
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
    public function store(DiscardRequest $request)
    {
        $this->huyoubutu->insertHuyoubutu($request);
        return redirect()->route('discard_list.show', ['id'=>$request->listroom_id]);
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
            $huyoubutu = Huyoubutu::with('listroom')->find($id);
            $huyoubutu_user_id = $huyoubutu->listroom->user_id;
            $user_id = Auth::user()->id;
            // 認証している人が保有するkachi_idならばshow.bladeを表示
            if($huyoubutu_user_id == $user_id){
                $kachis = $this->kachi->allDataGet();
                return view('user.discardobj.edit', compact('huyoubutu','kachis'));
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
    public function update(DiscardRequest $request, $id)
    {
        #データベースの更新
        $update_huyoubutu = $this->huyoubutu->find($id);
        $update_huyoubutu->item = $request->item;
        $update_huyoubutu->favorite = $request->favorite;
        $update_huyoubutu->kachi_id = $request->kachi_option;
        $update_huyoubutu->memo = $request->memo;
        $update_huyoubutu->save();

        return redirect()->route('discard_list.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_huyoubutu = $this->huyoubutu->find($id);
        $destroy_huyoubutu->delete();

        return redirect()->route('discard_list.index');
    }

    public function discard(Request $request)
    {
        $listname = $this->listroom->getListRoomObj($request->list_name);
        foreach($request->discard as $huyoubutu_id){
            $this->huyoubutu->discardHuyoubutu($huyoubutu_id);
        }
        return redirect()->route('discard_list.show', ['id'=> $listname->id]);
    }
}
