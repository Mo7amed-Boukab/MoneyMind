<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Epargne extends Model
{
    use HasFactory;

    protected $fillable = [
        'objectif_mensuel',
        'epargne_total',
        'epargne_mensuel',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liste_souhaite()
    {
        return $this->belongsTo(ListeSouhaites::class);
    }
}
