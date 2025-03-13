<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = [
      'name',
      'email',
      'password',
      'phone',
      'role',
      'salaire',
      'date_salaire',
      'balance',
      'logged_at'
     ];

    public function categories(){
        return $this->hasMany(Categorie::class);
    }
    public function revenu()
    {
        return $this->hasMany(Revenu::class);
    }
    public function depense()
    {
        return $this->hasMany(Depense::class);
    }

    public function liste_souhaite()
    {
        return $this->hasMany(ListeSouhaites::class);
    }
    public function epargne()
    {
        return $this->hasMany(Epargne::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->date_salaire) {
                $user->date_salaire = Carbon::now()->endOfMonth()->toDateString();
            }
        });
    }
}
