<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\portfolio;
use App\Models\statusacount;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'fotografia',
        'fecha_nacimiento',
        'rol_id',
        'correos',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['created_at','updated_at','fecha_nacimiento'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get all of the portfolio for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portfolio(): HasMany
    {
        return $this->hasMany(portfolio::class, 'foreign_key', 'local_key');
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(statusacount::class, 'foreign_key', 'local_key');
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
