<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\EpargneController;
use App\Http\Controllers\ListeSouhaitesController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
   return view('home');
});

Route::prefix('admin/')->middleware(['auth','admin'])->group(function () {

   Route::get('accueil',[AdminController::class,'index'])->name('admin.index');
   Route::get('users',[AdminController::class,'viewUsersPage'])->name('admin.users');
   Route::delete('users/{id}', [AdminController::class, 'supprimerUser'])->name('admin.users.destroy');

   Route::get('categorie',[CategorieController::class,'viewCategoriePage'])->name('admin.categorie');
   Route::post('categories', [CategorieController::class, 'ajouterCategorie'])->name('admin.categorie.ajouter');
   Route::put('categories/{id}', [CategorieController::class, 'modifierCategorie'])->name('admin.categorie.modifier');
   Route::delete('categories/{id}', [CategorieController::class, 'supprimerCategorie'])->name('admin.categorie.supprimer');

   Route::get('notification',[AdminController::class,'viewNotificationPage'])->name('admin.notification');
   Route::post('notification/mark-as-read/{id}', [AdminController::class, 'markAsRead'])->name('admin.notification.lu');
});

Route::prefix('user/')->middleware(['auth','user'])->group(function () {
   Route::get('accueil',[UserController::class,'index'])->name('user.index');
   Route::get('revenu', [RevenuController::class, 'viewRevenuPage'])->name('user.revenu');
   Route::post('salaire', [RevenuController::class, 'modifierSalaire'])->name('user.salaire');
   
   Route::get('depense', [depenseController::class, 'viewDepensePage'])->name('user.depense');
   Route::post('depense', [depenseController::class, 'ajouterDepense'])->name('depense.ajouter');
   Route::put('depense/{depense}', [depenseController::class, 'modifierDepense'])->name('depense.modifier');
   Route::delete('depense/{depense}', [depenseController::class, 'supprimerDepense'])->name('depense.supprimer');

   Route::get('epargne',[epargneController::class,'viewEpargnePage'])->name('user.epargne');
   Route::post('epargne/objectif-mensuel', [epargneController::class, 'modifierObjectifMensuel'])->name('epargne.objectif-mensuel');
   Route::post('epargne/objectif-annuel', [epargneController::class, 'modifierObjectifAnnuel'])->name('epargne.objectif-annuel');
   
   Route::post('liste-souhaites', [ListeSouhaitesController::class, 'AjouterSouhaite'])->name('liste-souhaites.store');
   Route::post('liste-souhaites/ajoute-epargne/{id}', [ListeSouhaitesController::class, 'ajouterEpargne'])->name('liste_souhaites.ajouterEpargne');
   
   Route::get('notification',[NotificationController::class,'viewNotificationPage'])->name('user.notification');
   Route::post('notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.lu');

   Route::get('historique', [TransactionController::class, 'viewHistoriquePage'])->name('user.historique');
  });


Route::get('/dashboard', function () {
 return view('dashboard/user/profile');
})->middleware(['auth', 'verified','user'])->name('user.profile');

Route::middleware('auth','user')->group(function () {
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

