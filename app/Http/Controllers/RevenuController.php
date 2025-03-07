<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Revenu;
use App\Models\User;
use Carbon\Carbon;
class RevenuController extends Controller
{
 public function viewRevenuHistorique()
 {
     $revenus = Revenu::where('user_id', Auth::id())->get();
     $user = User::where('id', Auth::id())->first();
     $date_salaire = Carbon::createFromFormat('d',$user->date_salaire)->format('d/m/Y');
  
     return view('dashboard/user/revenu', compact('revenus', 'date_salaire'));
 }
}
