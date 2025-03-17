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

Route::middleware(['auth'])->group(function () {

   Route::get('/admin/accueil',[AdminController::class,'index'])->name('admin.index');
   Route::get('/admin/users',[AdminController::class,'viewUsersPage'])->name('admin.users');
   Route::delete('/admin/users/{id}', [AdminController::class, 'supprimerUser'])->name('admin.users.destroy');

   Route::get('/admin/categorie',[CategorieController::class,'viewCategoriePage'])->name('admin.categorie');
   Route::post('/admin/categories', [CategorieController::class, 'ajouterCategorie'])->name('admin.categorie.ajouter');
   Route::put('/admin/categories/{id}', [CategorieController::class, 'modifierCategorie'])->name('admin.categorie.modifier');
   Route::delete('/admin/categories/{id}', [CategorieController::class, 'supprimerCategorie'])->name('admin.categorie.supprimer');

   Route::get('/user/accueil',[UserController::class,'index'])->name('user.index');
   Route::get('/user/revenu', [RevenuController::class, 'viewRevenuPage'])->name('user.revenu');
   Route::post('/user/salaire', [RevenuController::class, 'modifierSalaire'])->name('user.salaire');
   
   Route::get('/user/depense', [depenseController::class, 'viewDepensePage'])->name('user.depense');
   Route::post('/user/depense', [depenseController::class, 'ajouterDepense'])->name('depense.ajouter');
   Route::put('user/depense/{depense}', [depenseController::class, 'modifierDepense'])->name('depense.modifier');
   Route::delete('user/depense/{depense}', [depenseController::class, 'supprimerDepense'])->name('depense.supprimer');

   Route::get('/user/epargne',[epargneController::class,'viewEpargnePage'])->name('user.epargne');
   Route::post('/user/epargne/objectif-mensuel', [epargneController::class, 'modifierObjectifMensuel'])->name('epargne.objectif-mensuel');
   Route::post('/user/epargne/objectif-annuel', [epargneController::class, 'modifierObjectifAnnuel'])->name('epargne.objectif-annuel');
   
   Route::post('/user/liste-souhaites', [ListeSouhaitesController::class, 'AjouterSouhaite'])->name('liste-souhaites.store');
   Route::post('user/liste-souhaites/ajoute-epargne/{id}', [ListeSouhaitesController::class, 'ajouterEpargne'])->name('liste_souhaites.ajouterEpargne');
   
   Route::get('/user/notification',[NotificationController::class,'viewNotificationPage'])->name('user.notification');
   Route::post('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.lu');

   Route::get('/user/historique', [TransactionController::class, 'viewHistoriquePage'])->name('user.historique');
});


Route::get('/dashboard', function () {
 return view('dashboard/user/profile');
})->middleware(['auth', 'verified'])->name('user.profile');

Route::middleware('auth')->group(function () {
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
