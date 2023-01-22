<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wantbuy extends Model
{
    use HasFactory;

    public function list_buy()
    {
        return $this->belongsTo(List_Buy::class, 'list_buy_id');
    }

    public function kachi()
    {
        return $this->belongsTo(Kachi::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
