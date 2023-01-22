<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Buy extends Model
{
    use HasFactory;

    public function registrant()
    {
        return $this->belongsTo(User::class);
    }

    public function wantbuys()
    {
        return $this->hasMany(Wantbuy::class, 'list_buy_id');
    }

}
