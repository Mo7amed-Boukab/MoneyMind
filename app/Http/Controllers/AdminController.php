<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\User;
use App\Models\Categorie;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() 
    {
       // Total Users 
        $totalUsers = User::where('role', 'user')->count();
        $usersDernièreMois = User::where('role', 'user')
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->count();
        $usersEvolution = $totalUsers > 0 ? round(($usersDernièreMois / $totalUsers) * 100) : 0;

     // Salaire Moyenne 
        $salaireMoyenne = User::where('role', 'user')->avg('salaire');
        $salaireMoyenneDernièreMois = User::where('role', 'user')
            ->where('updated_at', '>=', Carbon::now()->subMonth())
            ->avg('salaire');
        $salaireEvolution = $salaireMoyenne > 0 ? round((($salaireMoyenneDernièreMois - $salaireMoyenne) / $salaireMoyenne) * 100): 0;

        // Users inactives
        $usersInactive = User::where('role', 'user')
            ->whereNotNull('logged_at')
            ->where('logged_at', '<=', Carbon::now()->subDays(60))
            ->count();

       // Dernières utilisateurs et catégories
        $users = User::where('role', 'user')
            ->latest()
            ->take(4)
            ->get()
            ->map(function($user) {
                $user->status = Carbon::parse($user->logged_at)->diffInDays(Carbon::now()) > 60 ? 'inactif' : 'actif';
                return $user;
            });

        $categories = Categorie::withSum('depenses', 'montant_depense')
            ->withCount('depenses')
            ->latest()
            ->take(4)
            ->get()
            ->map(function($categorie) {
                $totalDepenses = Depense::sum('montant_depense');
                $categorie->pourcentage = $totalDepenses > 0 ? round(($categorie->depenses_sum_montant_depense / $totalDepenses) * 100) : 0;
                return $categorie;
            });

        return view("dashboard/admin/index", compact(  "users",  "categories",   "totalUsers",  "usersEvolution", "salaireMoyenne",  "salaireEvolution",  "usersInactive" ));
    }
    public function viewUsersPage(){
       $users = User::where('role', 'user')->paginate(10);
       return view('dashboard/admin/users', compact('users'));
    }

     public function supprimerUser($id)
    {
        $user = User::findOrFail($id);
        
        $lastLogin = Carbon::parse($user->logged_at);
        $isInactive = $lastLogin->diffInDays(Carbon::now()) > 60;
        
        if (!$isInactive) {
            return redirect()->back()->with('error', 'Impossible de supprimer un utilisateur actif. Seuls les utilisateurs inactifs depuis plus de 2 mois peuvent être supprimés.');
        }

        $user->delete();
        return redirect()->back()->with('delete', 'Utilisateur supprimé avec succès');
    }
}