<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterUser extends Model
{
    use HasFactory;
    protected $table = 'chapter_user';

    protected $fillable = [
        'user_id',
        'chapter_id',
        'unlocked'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
