<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterImage extends Model
{
    use HasFactory;
    protected $fillable=['image','chapter_id'];

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
