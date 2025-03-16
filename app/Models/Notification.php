<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
     'titre',
     'message',
     'importance',
     'user_id',
     'est_lu',
     'date_envoi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
