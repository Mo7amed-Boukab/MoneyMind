<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Depense;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index()
    {
        $user = auth::user();

        $userSalaire = $user->salaire; 
        $soldActuel = $user->balance;
        $dateSalaire =  Carbon::createFromFormat('d',$user->date_salaire)->format('d/m/Y');  
        $totalDepenses = Depense::where('user_id', Auth::id())->sum('montant_depense');
      
        return view("dashboard/user/index", compact("totalDepenses","soldActuel", "userSalaire","dateSalaire"));
       }

}
