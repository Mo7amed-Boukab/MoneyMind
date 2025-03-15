<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Depense;
use App\Models\Epargne;
use App\Models\User;
use Carbon\Carbon;


class SubDepense extends Command
{
    protected $signature = 'depense:sub';
    protected $description = 'Déduire les dépense récurrente de salaire';

    public function handle()
    {
        Carbon::setLocale('fr');
        $today = Carbon::now()->day;
        $users = User::all();

        foreach ($users as $user) {
            $depenses = Depense::where('user_id', $user->id)->where('type', 'recurrente')->get();
            $epargne = Epargne::where('user_id', $user->id)->first();
            foreach ($depenses as $depense) {
               $datePaiement = Carbon::parse($depense->date_paiement);
               if ($today == $datePaiement->day) { 
                  if($user->balance > $depense->montant_depense ) {
                     $user->balance -= $depense->montant_depense;
                     $user->save();

                     $epargne->epargne_total = max(0, $epargne->epargne_total -= $depense->montant_depense);
                     $epargne->epargne_mensuel = max(0, $epargne->epargne_mensuel -= $depense->montant_depense);
                     $epargne->save();
                  }
               }       
            }  
        }
  
        $this->info("Le commande de déduction des dépenses est excuté avec succès.");  
     }
}