<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huyoubutu extends Model
{
    use HasFactory;

    protected $table = 'huyoubutus';
    # 代入する属性
    protected $fillable = [
        'item',
        'favorite',
        'list_room_id',
        'kachi_id',
        'delete_status'
    ];

    public function listroom()
    {
        return $this->belongsTo(ListRoom::class, 'list_room_id');
    }

    public function kachi()
    {
        return $this->belongsTo(Kachi::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    #新規データの登録
    public function insertHuyoubutu($request)
    {
        $result = $this->fill([
            'item' => $request->item,
            'favorite' => $request->favorite,
            'list_room_id' =>$request->listroom_id,
            'kachi_id' => $request->kachi_option,
            'delete_status' => 0
        ]);
        $result->save();
        return $result;
    }

    # 捨てる時の処理
    public function discardHuyoubutu($id)
    {
        $result = Self::find($id)->update(['delete_status' => 1]);
        return $result;
    }

}
