<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\depenseController;
use App\Http\Controllers\epargneController;
use App\Http\Controllers\ListeSouhaitesController;


Route::get('/', function () {
    return view('home');
});

Route::get('/user/accueil',[UserController::class,'user'])->name('user.index');
Route::get('/admin/accueil',[UserController::class,'admin'])->name('admin.index');
Route::get('/user/depense', [depenseController::class, 'viewDepensePage'])->name('user.depense');
Route::post('/user/depense', [depenseController::class, 'ajouterDepense'])->name('depense.ajouter');

Route::get('/user/revenu',[UserController::class,'viewRevenuPage'])->name('user.revenu');
Route::post('/user/salaire', [UserController::class, 'modifierSalaire'])->name('user.salaire');

Route::get('/user/epargne',[epargneController::class,'viewEpargnePage'])->name('user.epargne');
Route::post('/user/epargne/objectif', [epargneController::class, 'ajouterObjectif'])->name('epargne.objectif');
Route::post('/user/liste-souhaites', [ListeSouhaitesController::class, 'AjouterSouhaite'])->name('liste-souhaites.store');
Route::post('user/liste-souhaites/ajoute-epargne/{id}', [ListeSouhaitesController::class, 'ajouterEpargne'])->name('liste_souhaites.ajouterEpargne');

Route::get('/user/notification',[UserController::class,'viewNotificationPage'])->name('user.notification');
Route::get('/user/revenu', [RevenuController::class, 'viewRevenuHistorique'])->name('user.revenu');
Route::get('/user/profile', function () {
return view('/dashboard/user/profile');
})->name('user.profile');


// Route::get('/dashboard', function () {
//  return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/depense/{depense}', [depenseController::class, 'modifierDepense'])->name('depense.modifier');
Route::delete('/depense/{depense}', [depenseController::class, 'supprimerDepense'])->name('depense.supprimer');



require __DIR__.'/auth.php';
