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
        $epargne = Epargne::where('user_id',$user->id)->first();
        $epargne = Epargne::where('user_id', auth::id())->first();
        $listeSouhaites = ListeSouhaites::where('user_id', auth::id())->get(); 
        return view("dashboard/user/epargne", compact("epargne","listeSouhaites"));
    }
            
    public function ajouterObjectif(Request $request)
    {
        $request->validate([
            'objectif_mensuel' => 'required|numeric',
        ]);
        $epargne = Epargne::where('user_id', auth::id())->first();

        if ($epargne) {
            $epargne->objectif_mensuel = $request->objectif_mensuel;
            $epargne->save();
        } else {
            Epargne::create([
                'objectif_mensuel' => $request->objectif_mensuel,
                'montant_epargne' => 0,
                'user_id' => auth::id(),
            ]);
        }

        return redirect()->back()->with('update', 'Objectif d\'épargne a modifier avec succès.');
    }
}