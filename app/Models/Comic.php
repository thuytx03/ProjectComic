<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable=[
        'name',
        'slug',
        'cover_image',
        'description',
        'author',
        'view',
        'status',
        'vip',
        'price',
    ];
    public function genres()
    {
        return $this->belongsToMany(Genre::class,'genre_comics');
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class,);
    }


}
