<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
     
     $request->validate([
      'name' => ['required', 'string'],
      'email' => ['required', 'string', 'lowercase', 'email'],
      'salaire' => ['required', 'numeric'],
      'date_salaire' => ['required', 'numeric'],
      'password' => ['required', 'confirmed'],
    ]);
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'salaire' => $request->salaire, 
          'date_salaire' => $request->date_salaire,
          'role' => 'user', 
          'password' => Hash::make($request->password),
      ]);
      Notification::create([
       'titre' => "Nouveau utilisateur inscrit",
       'message' => "Nous avons détecté une nouvelle inscription sous le nom $request->name",
       'importance' => 0,
       'user_id' => User::where('role', 'admin')->value('id'),
      ]);   
        event(new Registered($user));

        Auth::login($user); 

        return redirect()->route('user.index' );

        
    }
}
