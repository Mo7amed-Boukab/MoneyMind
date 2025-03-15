<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Revenu;
use Carbon\Carbon;
class RevenuController extends Controller
{
 public function viewRevenuPage()
 {
     $user = auth::user();
     $revenus = Revenu::where('user_id', $user->id)->paginate(3);
     $date_salaire = Carbon::createFromFormat('d',$user->date_salaire)->format('d/m/Y');
  
     return view('dashboard/user/revenu', compact('revenus', 'date_salaire'));
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
