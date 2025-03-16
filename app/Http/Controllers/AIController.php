<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ListeSouhaites;
use App\Models\Depense;
use App\Models\Epargne;
use App\Models\Categorie;
use App\Services\AIService;
use Illuminate\Support\Facades\Auth;

class AIController
{
    public static function get()
    {
        $user = User::find(Auth::id());
        $userBudget = $user->balance;
        $categories = Categorie::all();
        $depenses =  Depense::where("user_id", $user->id)->get();
        $epargne =  Epargne::where("user_id", $user->id)->get();
        $listeSouhaite =  ListeSouhaites::where("user_id", $user->id)->get();

        $AiConsiel = (new AIService)->getAiConsiel([
            'budget'=> $userBudget,
            'categorieDepenses'=> $categories,
            'depenses' => $depenses,
            'epargne' => $epargne,
            'ListeSouhaites' => $listeSouhaite,
        ]);

        return $AiConsiel;
    }
}