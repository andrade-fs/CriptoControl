<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLogin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'provider', 'nick_email', 'social_id'];
    protected $table = "social_logins";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
