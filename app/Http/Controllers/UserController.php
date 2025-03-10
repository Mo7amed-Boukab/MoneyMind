<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Depense;
use App\Models\User;
use App\Models\Categorie;
use Carbon\Carbon;


class UserController extends Controller
{
    // --------------------------------------------------- For User Dashboard 
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
       $depense = Depense::where('user_id', $user->id)->get();
       $depense = $depense->groupBy(function ($item) {
        return $item->created_at ? Carbon::parse($item->created_at)->format('Y') : null;
       })->first();

       $depenses = $depense->groupBy(function ($item) {
        return $item->created_at ? Carbon::parse($item->created_at)->format('Y-m') : null;
       })->mapWithKeys(function($group, $key){
        $monthName = Carbon::parse($key)->format('F');
        return [$monthName => $group->sum('montant_depense')];
       });
       // -- result 
        $months = array_keys($depenses->toArray());
        $sum = array_values($depenses->toArray());

        $userSalaire = $user->salaire; 
        $soldActuel = $user->balance;
        $dateSalaire =  Carbon::createFromFormat('d',$user->date_salaire)->format('d/m/Y');  
        $totalDepenses = Depense::where('user_id', Auth::id())->sum('montant_depense');
        $AiConseil = AIConseilController::get();  

        return view("dashboard/user/index", compact("totalDepenses","soldActuel", "userSalaire","dateSalaire", "AiConseil", "months","sum","categories","total"));
       }

}
