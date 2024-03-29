<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ListRoom extends Model
{
    use HasFactory;

    protected $table = 'list_rooms';
    public $timestamps = false;
    # 代入する属性
    protected $fillable = [
        'user_id',
        'list_name'
    ];

    # user作成時の初期登録
    public function firstInsertList($user_id)
    {
        $result = $this->fill([
            'user_id' => $user_id,
            'list_name' => '未分類'
        ]);
        $result->save();
        return $result;
    }
    # 新規データの登録
    public function insertListRoom($request)
    {
        $result = $this->fill([
            'user_id' => Auth::id(),
            'list_name' => $request->list_name
        ]);
        $result->save();
        return $result;
    }
    # リストnameの重複を確認
    public function checkListName($request)
    {
        $result = self::where("user_id","=",Auth::id())->where("list_name", "=", $request->list_name)->first();
        if($result){
            $flag = False;
        } else{
            $flag = True;
        }
        return $flag;
    }

    # リスト内の不要物件数の取得
    public function getCounthuyoubutus($id)
    {
        $listrooms = Self::with('huyoubutus')->where('user_id', '=', $id)->get();
        return $listrooms;
    }

    # リストnameからlist_idを取得
    public function getListRoomObj($listname)
    {
        $user_id = Auth::id();
        $listroom_obj = Self::where([
            ['user_id', '=', $user_id],
            ['list_name', '=', $listname]
        ])->first();
        if($listroom_obj == Null){
            return False;
        }
        return $listroom_obj;
    }

    public function registrant()
    {
        return $this->belongsTo(User::class);
    }

    public function huyoubutus()
    {
        return $this->hasMany(Huyoubutu::class, 'list_room_id');
    }

}
