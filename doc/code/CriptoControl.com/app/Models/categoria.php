<?php

namespace App\Models;
use App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    
    protected $fillable = [ "nombre","descripcion","id"];

    protected $table = "categorias";
    protected $dates = ['created_at','updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
     /**
      * Get all of the comments for the categoria
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function categoria(): HasMany
     {
         return $this->hasMany(post::class);
     }
}
