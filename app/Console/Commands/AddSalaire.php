<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Revenu;
use App\Models\Epargne;

class AddSalaire extends Command
{
    protected $signature = 'salaire:add';
    protected $description = 'Ajoute le salaire mensuellement';

    public function handle()
    {
        Carbon::setLocale('fr');
        $today = Carbon::now()->day;
        $month = Carbon::now()->translatedFormat('F'); 
        $users = User::all();

        foreach ($users as $user) {
            $epargne = Epargne::where('user_id', $user->id)->first();

            if ($epargne) {
                $jourVersement = Carbon::createFromFormat('d',$user->date_salaire)->format('d');
                if ($today == $jourVersement) {
                    Revenu::create([
                        'date' => Carbon::now(),
                        'description' => 'Salaire du mois de ' . $month,
                        'montant_salaire' => $user->salaire,
                        'user_id' => $user->id
                    ]);
                    $salaireNet = $user->salaire - $epargne->montant_epargne;
                    $epargne->epargne_annuel +=  $epargne->montant_epargne;
                    $user->balance += $salaireNet; 
                    $epargne->epargne_total += $salaireNet;
                    $epargne->epargne_mensuel = $salaireNet; 
                    $user->save();
                    $epargne->save();
                }
            }
        }

        $this->info("Le commende de l'ajoute du salaire est executé avec succès.");
    }
}
