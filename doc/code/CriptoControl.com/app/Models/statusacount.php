<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class statusacount extends Model
{
use HasFactory;
protected $fillable = [ "solvencia","usuario_id"];

protected $table = "statusacount";
protected $dates = ['created_at','updated_at'];
protected $hidden = ['updated_at',"usuario_id" ];
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