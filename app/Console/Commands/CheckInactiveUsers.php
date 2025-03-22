<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Notification;
use Carbon\Carbon;

class CheckInactiveUsers extends Command
{
    protected $signature = 'users:check-inactive';
    protected $description = 'Vérifie les utilisateurs inactifs depuis plus de 2 mois et envoie des notifications';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $twoMonthsAgo = Carbon::now()->subMonths(2);
        
        $inactiveUsers = User::where('role', 'user')
            ->whereNotNull('logged_at')
            ->where('logged_at', '<=', $twoMonthsAgo)
            ->get();
        
        $admin = User::where('role', 'admin')->first();
        
        $count = 0;
        foreach ($inactiveUsers as $user) {

            Notification::create([
                'user_id' => $admin->id,
                'titre' => 'Utilisateur inactif',
                'message' => "L'utilisateur {$user->name} n'a pas été actif depuis plus de 2 mois.",
                'importance' => 1, 
                'est_lu' => 0
            ]);
            $count++;
        }
        
        $this->info("$count notifications envoyées à l'administrateur concernant les utilisateurs inactifs.");
    }
} 