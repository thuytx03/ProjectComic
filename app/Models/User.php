<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_user', 'user_id', 'chapter_id')->withPivot('unlocked');
    }
    public function followedComics()
    {
        return $this->belongsToMany(Comic::class, 'follows', 'user_id', 'comic_id');
    }

    public function following($comicId)
    {
        return $this->followedComics()->where('comics.id', $comicId)->exists();
    }
    public function order_coin(){
        return $this->hasMany(OrderCoin::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }


}
