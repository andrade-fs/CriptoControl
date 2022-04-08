<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class portfolio extends Model
{
    use HasFactory;
    protected $fillable = [ "moneda","precio_compra","cantidad","fecha_publicacion","usuario_id" ];

    protected $table = "portfolio";
    protected $dates = ['created_at','updated_at', 'fecha_publicacion'];
    protected $hidden = ['created_at', 'updated_at',"usuario_id" ];
    /**
     * Get the user that owns the portfolio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
