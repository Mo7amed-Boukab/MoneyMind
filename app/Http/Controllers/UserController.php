<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Depense;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function admin()
    {
        return view("dashboard/admin/index");
    }
    public function user()
    {
        $user = auth::user();

        $depensesParCategorie = $user->depense
        ->groupBy(function ($item) {
         return $item->categorie->name;
        })
        ->map(function ($group, $key) {
         return $group->sum('montant_depense');
        });

        $categories = $depensesParCategorie->keys();
        $total = $depensesParCategorie->values();

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

       $months = array_keys($depenses->toArray());
       $sum = array_values($depenses->toArray());

        $totalDepenses = Depense::where('user_id', Auth::id())->sum('montant_depense');
        $user = User::where('id', auth::id())->first();
        $userSalaire = $user->salaire; 
        $soldActuel = $user->balance;
        $AiConseil = AIConseilController::get();  
        return view("dashboard/user/index", compact("totalDepenses","soldActuel", "userSalaire","AiConseil", "depensesParCategorie","months","sum","categories","total"));
    }

    public function viewNotificationPage()
    {
        return view("dashboard/user/notification");
    }
    public function modifierSalaire(Request $request)
    {
        $request->validate([
            'salaire' => 'required|numeric',
            'date_salaire' => 'required|numeric',
        ]);

        $user = auth::user();
        $user->salaire = $request->salaire;
        $user->date_salaire = $request->date_salaire;
        $user->save();

        return redirect()->back()->with('update', 'Salaire et date de salaire est modifié avec succès.');
    }
}
