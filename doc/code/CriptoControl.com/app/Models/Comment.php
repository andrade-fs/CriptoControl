<?php

namespace App\Models;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
     // fields can be filled
    protected $fillable = ['id','comentario', 'usuario_id', 'post_id', 'usuario_nombre'];
    protected $dates = ['created_at','updated_at'];

    protected $table = "comentarios";

    public function post()
    {
        return $this->belongsTo(post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
