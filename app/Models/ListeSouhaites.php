<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListeSouhaites extends Model
{
    use HasFactory;

    protected $fillable = [
     'description',
     'montant_necessaire',
     'montant_epargne',
     'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function epargne()
    {
        return $this->hasMany(Epargne::class);
    }

}


