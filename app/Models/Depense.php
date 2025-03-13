<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class depense extends Model
{
    use HasFactory;
    
    protected $fillable = [
       'description',
       'montant_depense',
       'type',
       'date_paiement',
       'categorie_id',
       'user_id'
     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    
}