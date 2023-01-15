<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kachi extends Model
{
    use HasFactory;
    
    protected $table = 'kachis';
    public $timestamps = false;

    # 代入する属性
    protected $fillable = [
        'user_id',
        'kachi'
    ];

    #リレーション
    public function registrant()
    {
        return $this->belongsTo(User::class);
    }

    public function huyoubutus()
    {
        return $this-hasMany(Huyoubutu::class);
    }

    public function allDataGet()
    {
        $user_id = Auth::id();
        $result = self::where('user_id', '=', $user_id)->get();
        return $result;
    }

    /**
    *下記のように書くことで、ソートされたデータが取得できる
    *    public function getAllPostsByUserId($user_id)
    *{
    *    $result = $this->where('user_id', $user_id)->with('category')->get();
    *    return $result;
    *}
    */

    # 新規データの登録
    public function insertKachi($request)
    {
        $result = $this->fill([
            'user_id' => Auth::id(),
            'kachi' => $request->kachi
        ]);
        $result->save();
        return $result;
    }
}
