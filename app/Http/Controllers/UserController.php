<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Depense;
use App\Models\Notification;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index()
    {
        $user = auth::user();
        // les dépenses par catégorie
        $depensesParCategorie = $user->depense->groupBy(function ($item) {
         return $item->categorie->name;
        })
        ->map(function ($group, $key) {
         return $group->sum('montant_depense');
        });
        // -- result 
        $categories = $depensesParCategorie->keys();
        $total = $depensesParCategorie->values();

      // les dépenses par mois
        $depensesCollection = Depense::where('user_id', $user->id)->get();
        if ($depensesCollection->isNotEmpty()) {
            $depensesParAnnee = $depensesCollection->groupBy(function ($item) {
                return $item->created_at ? Carbon::parse($item->created_at)->format('Y') : null;
            })->first();

            if ($depensesParAnnee) {
                $depenses = $depensesParAnnee->groupBy(function ($item) {
                    return $item->created_at ? Carbon::parse($item->created_at)->format('Y-m') : null;
                })->mapWithKeys(function ($group, $key) {
                    $monthName = Carbon::parse($key)->format('F');
                    return [$monthName => $group->sum('montant_depense')];
                });

                $months = array_keys($depenses->toArray());
                $sum = array_values($depenses->toArray());
            } else {
                $depenses = collect();
                $months = ['Aucune dépense'];
                $sum = [0];
            }
        } else {
            $depenses = collect();
            $months = ['Aucune dépense'];
            $sum = [0];
        }

        $months = array_keys($depenses->toArray());
        $sum = array_values($depenses->toArray());      

        $userSalaire = $user->salaire; 
        $soldActuel = $user->balance;
        $dateSalaire =  Carbon::createFromFormat('d',$user->date_salaire)->format('d/m/Y');  
        $totalDepenses = Depense::where('user_id', Auth::id())->sum('montant_depense');
        $notifications = Notification::where('user_id', $user->id)->where('est_lu',0)->orderBy('created_at', 'desc')->get();
        $countNotifications = Notification::where('user_id', $user->id)->where('est_lu',0)->count('est_lu');
        $AiConseil = AIController::get(); 
        return view("dashboard/user/index", compact("totalDepenses","soldActuel", "userSalaire","dateSalaire","months","sum","categories","total","notifications","countNotifications","AiConseil"));
       }

}
