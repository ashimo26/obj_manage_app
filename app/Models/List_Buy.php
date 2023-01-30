<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class List_Buy extends Model
{
    use HasFactory;

    protected $table = 'list_buys';
    public $timestamps = false;
    # 代入する属性
    protected $fillable = [
        'user_id',
        'list_name'
    ];

    # リスト内の不要物件数の取得
    public function getCounthuyoubutus($id)
    {
        $listbuys = Self::with('wantbuys')->where('user_id', '=', $id)->get();
        return $listbuys;
    }

    public function firstInsertList($user_id)
    {
        $result = $this->fill([
            'user_id' => $user_id,
            'list_name' => '未分類'
        ]);
        $result->save();
        return $result;
    }

    public function insertListBuy($request)
    {
        $result = $this->fill([
            'user_id' => Auth::id(),
            'list_name' => $request->list_name
        ]);
        $result->save();
        return $result;
    }

    public function registrant()
    {
        return $this->belongsTo(User::class);
    }

    public function wantbuys()
    {
        return $this->hasMany(Wantbuy::class, 'list_buy_id');
    }

}
