<?php

namespace App\Models;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $fillable = [ "titulo","subtitulo","votos","contenido","foto", "categoria_id","usuario_id"];
    // dd($_POST['categoria_id']);

    protected $table = "posts";
    protected $dates = ['created_at','updated_at', 'fecha_publicacion'];
    protected $hidden = ['created_at', 'updated_at',"usuario_id" ];
    /**
     * Get the user that owns the portfolio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
}
