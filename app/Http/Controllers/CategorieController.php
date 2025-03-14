<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Depense;

class CategorieController extends Controller
{
   public function viewCategoriePage()
   {
       $categories = Categorie::withCount('depenses')
           ->withSum('depenses', 'montant_depense')
           ->get()
           ->map(function($categorie) {
               $totalDepenses = Depense::sum('montant_depense');
               $categorie->pourcentage = $totalDepenses > 0 
                   ? round(($categorie->depenses_sum_montant_depense / $totalDepenses) * 100)
                   : 0;
               return $categorie;
           });

       return view('dashboard.admin.categories', compact('categories'));
   }
   public function ajouterCategorie(Request $request)
   {
          $request->validate([
             'name' => 'required|string|max:255|unique:categories'
          ]);

          Categorie::create([
             'name' => $request->name,
             'user_id' => auth::id()
          ]);

       return redirect()->back()->with('add', 'Catégorie ajoutée avec succès');
   }

   public function modifierCategorie(Request $request, $id)
   {
       $request->validate([
           'name' => 'required|string|max:255' 
       ]);

       $categorie = Categorie::findOrFail($id);
       $categorie->update([
           'name' => $request->name,
           'user_id' => auth::id()
       ]);

       return redirect()->back()->with('update', 'Catégorie modifiée avec succès');
   }

   public function supprimerCategorie($id)
   {
       $categorie = Categorie::findOrFail($id);
       
       if($categorie->depenses()->count() > 0) {
           return redirect()->back()->with('error', 'Impossible de supprimer une catégorie utilisée');
       }
       
       $categorie->delete();
       return redirect()->back()->with('delete', 'Catégorie supprimée avec succès');
   }
}
