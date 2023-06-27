<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCoin extends Model
{
    use HasFactory;
    protected $fillable=['first_name', 'last_name', 'email','phone','coins','user_id','description','image','payment','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
