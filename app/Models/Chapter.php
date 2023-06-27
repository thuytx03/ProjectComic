<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable=[
        'name','slug','number_chapter','status','comic_id'
    ];
    public function chapterImages(){
        return $this->hasMany(ChapterImage::class);
    }
    public function comic(){
        return $this->belongsTo(Comic::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'chapter_user', 'chapter_id', 'user_id')->withPivot('unlocked');
}

}
