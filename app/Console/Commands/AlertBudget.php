<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Revenu;
use App\Models\Depense;
use App\Models\Notification;
use App\Mail\envoyerEmail;
use Illuminate\Support\Facades\Mail;


class AlertBudget extends Command
{
    protected $signature = 'budget:alert';
    protected $description = 'Envoie de Alerte budgétaire';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
           $userSalaireDuMois = Revenu::where('user_id', $user->id)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year) 
            ->sum('montant_salaire');

           $totalDepensesDuMois = Depense::where('user_id', $user->id)
           ->whereMonth('created_at', Carbon::now()->month)
           ->whereYear('created_at', Carbon::now()->year) 
           ->sum('montant_depense');

           $pourcentageDepense = ($totalDepensesDuMois * 100) / $userSalaireDuMois;
           $seuilAlerte = 0.7;
           $seuil = $seuilAlerte * 100;

            if($totalDepensesDuMois > ($userSalaireDuMois * $seuilAlerte)){
               Mail::to($user->email)->send(new envoyerEmail($user, $totalDepensesDuMois,$pourcentageDepense, $seuil));
               Notification::create([
                'titre' => "Dépassement de budget",
                'message' => "vous avez dépasser seuil de $seuil % de votre budget",
                'importance' => 1,
                'user_id' =>$user->id,
            ]);
            }
        }
    }
}