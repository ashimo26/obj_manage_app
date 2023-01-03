<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huyoubutu extends Model
{
    use HasFactory;

    public function listroom()
    {
        return $this->belongsTo(ListRoom::class);
    }

    public function kachi()
    {
        return $this->belongsTo(Kachi::class);
    }
}
