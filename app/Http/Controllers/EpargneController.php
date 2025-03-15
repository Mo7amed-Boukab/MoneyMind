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
        $epargne_total = $epargne->epargne_total ?? 0;
        $epargne_mensuel = $epargne->epargne_mensuel ?? 0;
        $objectif_mensuel = $epargne->objectif_mensuel ?? $userSalaire * 0.1;
        $objectif_annuel = $epargne->objectif_annuel ??  $userSalaire * 0.1 * 12;
        $epargne_objectif_annuel = $epargne->epargne_objectif_annuel ?? $userSalaire * 0.1;
        $epargne_annuel = $epargne->epargne_annuel ?? 0;    
        $listeSouhaites = ListeSouhaites::where('user_id', $user->id)->paginate(3);

        return view("dashboard/user/epargne", compact("epargne","userSalaire","epargne_total","epargne_mensuel","objectif_mensuel","objectif_annuel","epargne_objectif_annuel","epargne_annuel","listeSouhaites"));
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
            'epargne_objectif_annuel' => 'required|numeric|min:0',
        ]);

        $epargne = Epargne::where('user_id', auth::id())->first();
        $epargne->objectif_annuel = $request->objectif_annuel;
        $epargne->epargne_objectif_annuel = $request->epargne_objectif_annuel;
        $epargne->save();

        return redirect()->back()->with('update', 'Objectif annuel mis à jour avec succès');
    }
}