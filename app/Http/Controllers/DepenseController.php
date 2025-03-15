<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Categorie;
use App\Models\Epargne;
use Illuminate\Support\Facades\Auth;


class DepenseController extends Controller
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

        $user = Auth::user(); 
        $epargne = Epargne::where('user_id', $user->id)->first();

        if ($request->montant <= $user->balance) {
            Depense::create([
                'description' => $request->description,
                'montant_depense' => $request->montant,
                'categorie_id' => $request->categorie,
                'type' => $request->type,
                'date_paiement' => $request->date_paiement,
                'user_id' => $user->id,
            ]);

            $user->balance -= $request->montant;
            $user->save();
      
            if ($epargne) {
                $epargne->epargne_total = max(0, $epargne->epargne_total - $request->montant);
                $epargne->epargne_mensuel = max(0, $epargne->epargne_mensuel - $request->montant);
                $epargne->save();
            }
        } else {
            return redirect()->back()->with('error', 'Le montant de votre budget n\'est pas suffisant pour combler cette dépense');
        }

        return redirect()->back()->with('add', 'Dépense ajoutée avec succès.');
    }

    public function viewDepensePage()
    {
        $user = Auth::user(); 
        $depenses = Depense::where('user_id', $user->id)->where('type', 'recurrente')->paginate(3);
        $categories = Categorie::all();
        $totalDepensesRecurrente = Depense::where('user_id', $user->id)->where('type', 'recurrente')->sum('montant_depense');
        $totalDepenses = Depense::where('user_id', $user->id)->sum('montant_depense');
        $userSalaire = $user->salaire;
    
        return view('dashboard.user.depense', compact('depenses', 'categories', 'totalDepenses', 'totalDepensesRecurrente', 'userSalaire'));
    }

    public function modifierDepense(Request $request, Depense $depense)
    {
        $request->validate([
            'description' => 'required|string',
            'montant' => 'required|numeric',
            'categorie' => 'required',
            'date_paiement' => 'required|date',
        ]);

        $depense->update([
            'description' => $request->description,
            'montant_depense' => $request->montant,
            'categorie_id' => $request->categorie,
            'date_paiement' => $request->date_paiement,
        ]);

        return redirect()->route('user.depense')->with('update', 'La dépense a été modifiée avec succès.');
    }

    public function supprimerDepense(Depense $depense)
    {
        $depense->delete();
        return redirect()->route('user.depense')->with('delete', 'La dépense a été supprimée avec succès.');
    }
}
