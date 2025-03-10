<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epargne;
use App\Models\ListeSouhaites;
use Illuminate\Support\Facades\Auth;

class epargneController extends Controller
{
    public function viewEpargnePage()
    {
        $user = auth::user();
        $userSalaire = $user->salaire; 
        $epargne = Epargne::where('user_id',$user->id)->first();
        $listeSouhaites = ListeSouhaites::where('user_id', $user->id)->paginate(5); 
        return view("dashboard/user/epargne", compact("epargne","userSalaire","listeSouhaites"));
    }
            
    public function modifierObjectifMensuel(Request $request)
    {
        $user = auth::user();
        $request->validate([
            'objectif_mensuel' => 'required|numeric',
        ]);
        $epargne = Epargne::where('user_id', $user->id)->first();

        if ($epargne) {
            $epargne->objectif_mensuel = $request->objectif_mensuel;
            $epargne->save();
        } else {
            Epargne::create([
                'objectif_mensuel' => $request->objectif_mensuel,
                'montant_epargne' => 0,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back()->with('update', 'Objectif d\'épargne a modifier avec succès.');
    }
    public function modifierObjectifAnnuel(Request $request)
    {
        $request->validate([
            'objectif_annuel' => 'required|numeric|min:0',
            'epargne_objectif' => 'required|numeric|min:0',
        ]);

        $epargne = Epargne::where('user_id', auth::id())->first();
        $epargne->objectif_annuel = $request->objectif_annuel;
        $epargne->epargne_objectif = $request->epargne_objectif;
        $epargne->save();

        return redirect()->back()->with('update', 'Objectif annuel mis à jour avec succès');
    }
}