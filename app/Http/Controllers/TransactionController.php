<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Revenu;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function viewHistoriquePage(Request $request)
    {
        $user = Auth::user();
        
        $depenses = collect([]);
        $revenus = collect([]);
        
        $type = $request->input('type', 'all');
        $mois = $request->input('mois', 'all');
        $annee = $request->input('annee', 'all');
        
        $depensesQuery = Depense::where('user_id', $user->id);
        $revenusQuery = Revenu::where('user_id', $user->id);
        
        if ($request->filled('mois') && $request->mois != 'all') {
            $depensesQuery->whereMonth('created_at', $request->mois);
            $revenusQuery->whereMonth('created_at', $request->mois);
        }
        
        if ($request->filled('annee') && $request->annee != 'all') {
            $depensesQuery->whereYear('created_at', $request->annee);
            $revenusQuery->whereYear('created_at', $request->annee);
        }
        
        if ($request->filled('type')) {
            if ($request->type == 'depense_recurrente') {
                $depenses = $depensesQuery->where('type', 'recurrente')->get();
            } elseif ($request->type == 'depense_non_recurrente') {
                $depenses = $depensesQuery->where('type', 'non_recurrente')->get();
            } elseif ($request->type == 'revenu') {
                $revenus = $revenusQuery->get();
            } elseif ($request->type == 'all') {
                $depenses = $depensesQuery->get();
                $revenus = $revenusQuery->get();
            }
        } else {
            $depenses = $depensesQuery->get();
            $revenus = $revenusQuery->get();
        }
        
        $transactions = collect();
             
        foreach ($depenses as $depense) {
            $transactions->push([
                'date' => $depense->created_at,
                'type' => $depense->type == 'recurrente' ? 'Dépense récurrente' : 'Dépense non récurrente',
                'description' => $depense->description,
                'montant' => $depense->montant_depense,
                'categorie' => $depense->categorie->name ?? 'Non catégorisé',
                'class' => 'text-red-600'
            ]);
        }
        
        foreach ($revenus as $revenu) {
            $transactions->push([
                'date' => $revenu->created_at,
                'type' => 'Revenu',
                'description' => $revenu->description,
                'montant' => $revenu->montant_salaire,
                'categorie' => 'Salaire',
                'class' => 'text-green-600'
            ]);
        }
        
        $transactions = $transactions->sortByDesc('date');
        
        return view('dashboard.user.historique', compact(
            'transactions',
            'type',
            'mois',
            'annee'
        ));
    }
    
}