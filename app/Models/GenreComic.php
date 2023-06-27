<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreComic extends Model
{
    use HasFactory;
    protected $fillable=[
        'comic_id',
        'user_id'
    ];
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function comic(){
        return $this->belongsTo(Comic::class);
    }
}
