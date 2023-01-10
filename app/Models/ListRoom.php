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
    public function InsertListRoom($request)
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

    public function huyoubutus()
    {
        return $this-hasMany(Huyoubutu::class);
    }

}
