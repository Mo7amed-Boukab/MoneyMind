<?php

namespace App\Http\Controllers;

use App\Models\ListeSouhaites;
use App\Models\Epargne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListeSouhaitesController extends Controller
{
    public function AjouterSouhaite(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'montant_necessaire' => 'required|numeric',
        ]);

        ListeSouhaites::create([
            'description' => $request->description,
            'montant_necessaire' => $request->montant_necessaire,
            'montant_epargne' => 0,
            'user_id' => auth::id(),
        ]);

        return redirect(route('user.epargne'))->with('add', 'Souhait ajouté avec succès.');
    }

    public function ajouterEpargne(Request $request)
    {
        $request->validate([
            'montant_epargne' => 'required|numeric',
        ]);

        $souhait = ListeSouhaites::findOrFail($request->id);
        $epargne = Epargne::where('user_id', auth::id())->first();
         
        if ($request->montant_epargne > $epargne->epargne_total) {
            return redirect()->back()->with('error', 'Le montant d\'épargne à ajouter dépasse le montant d\'épargne total disponible.');
        }

         if ($request->montant_epargne > ($souhait->montant_necessaire - $souhait->montant_epargne)) {
            return redirect()->back()->with('error', 'Le montant d\'épargne à ajouter dépasse le montant nécessaire.');
         }
         
         $epargne->epargne_total = max(0, $epargne->epargne_total -= $request->montant_epargne);
         $epargne->epargne_mensuel = max(0, $epargne->epargne_mensuel -= $request->montant_epargne);  
         $epargne->save(); 
         
         $souhait->montant_epargne += $request->montant_epargne; 
         $souhait->save();

        return redirect()->back()->with('add', value: 'Épargne ajoutée avec succès.');
    }
}
