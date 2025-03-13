<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\depenseController;
use App\Http\Controllers\epargneController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
   return view('home');
});

Route::middleware(['auth'])->group(function () {

   Route::get('/admin/accueil',[AdminController::class,'index'])->name('admin.index');
   Route::get('/admin/users',[AdminController::class,'viewUsersPage'])->name('admin.users');
   Route::get('/admin/categorie',[CategorieController::class,'viewCategoriePage'])->name('admin.categorie');

   Route::get('/user/accueil',[UserController::class,'index'])->name('user.index');
   Route::get('/user/revenu', [RevenuController::class, 'viewRevenuPage'])->name('user.revenu');
   Route::get('/user/depense', [depenseController::class, 'viewDepensePage'])->name('user.depense');
   Route::get('/user/epargne',[epargneController::class,'viewEpargnePage'])->name('user.epargne');
   Route::get('/user/notification',[NotificationController::class,'viewNotificationPage'])->name('user.notification');
});

Route::get('/user/profile', function () {
     return view('/dashboard/user/profile');
})->name('user.profile');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
