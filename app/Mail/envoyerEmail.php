<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class envoyerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $depenses;
    public $pourcentageDepense;
    public $seuil;

    public function __construct(User $user, $totalDepense, $pourcentageDepense, $seuil_alerte)
    {
        $this->user = $user;
        $this->depenses = $totalDepense;
        $this->pourcentageDepense = $pourcentageDepense;
        $this->seuil = $seuil_alerte;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alerte Budgétaire - MoneyMind',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.alerteBudgetaire',
            with: [
                'userName' => $this->user->name, 
                'totalDepense' => $this->depenses,
                'pourcentageDepense' => $this->pourcentageDepense,
                'seuilAlerte' => $this->seuil
            ]
        );
    }

}
