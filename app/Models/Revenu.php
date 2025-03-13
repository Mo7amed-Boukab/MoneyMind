<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Revenu extends Model
{
    use HasFactory;

    protected $fillable = [
     'date',
     'description',
     'montant_salaire',
     'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
