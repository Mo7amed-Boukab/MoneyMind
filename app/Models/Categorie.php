<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'user_id'
  ];

  public function depenses()
  {
      return $this->hasMany(Depense::class);
  }
  
  public function user()
  {
        return $this->belongsTo(User::class);
  }

}
