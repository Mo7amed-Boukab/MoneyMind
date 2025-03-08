<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Epargne;

class depenseController extends Controller
{
    public function ajouterDepense(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'montant' => 'required|numeric',
            'categorie' => 'required',
            'type' => 'required|string',
            'date_paiement' => 'required|date'
        ]);

        $user = User::where('id', Auth::id())->first();
        $epargne = Epargne::where('user_id', Auth::id())->first();

        if($request->montant <= $user->balance){

            Depense::create([
             'description'=> $request->description,
             'montant_depense' => $request->montant,
             'categorie_id' => $request->categorie,
             'type' => $request->type,
             'date_paiement' => $request->date_paiement,
             'user_id' => auth::id()
            ]);

            $user->balance -= $request->montant; 
            $user->save();
            
            $epargne->epargne_total = max(0, $epargne->epargne_total -= $request->montant);
            $epargne->epargne_mensuel = max(0, $epargne->epargne_mensuel -= $request->montant);

            $epargne->save();
        }
        else{
            return redirect()->back()->with('error', 'Le montant de votre budget n\'est pas suffisant pour combler cette dépense');
        }
      
      

        return redirect()->back()->with( 'add', 'Dépense ajoutée avec succès.');
    }

    public function viewDepensePage()
    {
        $depenses = Depense::where('user_id', auth::id())->where('type', 'recurrente')->get();
        $categories = Categorie::all();
        $totalDepensesRecurrente = Depense::where('user_id', auth::id())->where('type','recurrente')->sum('montant_depense');
        $totalDepenses = Depense::where('user_id', Auth::id())->sum('montant_depense');
        $user = User::where('id', auth::id())->first();
        $userSalaire = $user->salaire;  
        // dd($userSalaire);
        return view('dashboard.user.depense', compact('depenses', 'categories','totalDepenses','totalDepensesRecurrente','userSalaire'));
    }

    public function modifierDepense(Request $request, Depense $depense)
    {
  
        $request->validate([
            'description' => 'required|string',
            'montant' => 'required|numeric',
            'categorie' => 'required',
            'date_paiement' => 'required|date',
        ]);
        // dd($request->all());
        $depense->update([
            'description'=> $request->description,
            'montant_depense' => $request->montant,
            'categorie_id' => $request->categorie,
            'date_paiement' => $request->date_paiement,
         ]);

        return redirect()->route('user.depense')->with('update', 'La dépense est modifier avec succès.');
    }

    public function supprimerDepense(Depense $depense)
    {
        $depense->delete();

        return redirect()->route('user.depense')->with('delete', 'La dépense est supprimée avec succès.');
    }
}
