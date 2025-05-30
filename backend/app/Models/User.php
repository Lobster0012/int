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

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'tg_id',
        'balance',
        'last_visit',     
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_visit' => 'datetime',
    ];

    // Связь с ачивками
    public function achievements()
    {
        return $this->belongsToMany(
            \App\Models\Achievement::class,
            'user_achievements', // промежуточная таблица
            'user_id',           // внешний ключ в user_achievements -> users
            'achievement_id',     // внешний ключ в user_achievements -> achievements
        );
    }

    // HIHIHIHIHIHIHIHIHIHIHI

    //bb
    public function hasAchievement(int $achievementId): bool
    {
        return $this->achievements()->where('achievement_id', $achievementId)->exists();
    }

    public function addCoins(int $amount)
    {
        $this->balance += $amount;
        $this->save();
    }


    // Здесь я сам что то отредачил
}
