<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Epargne extends Model
{
    use HasFactory;

    protected $fillable = [
        'objectif_mensuel',
        'epargne_mensuel',
        'epargne_total',
        'objectif_annuel',
        'epargne_objectif_annuel',
        'epargne_annuel',
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
