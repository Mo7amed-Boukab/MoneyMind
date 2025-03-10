<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

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
      'salaire' => ['nullable', 'numeric'],
      'date_salaire' => ['nullable', 'numeric'],
      'password' => ['required', 'confirmed'],
    ]);
dd($request->all());
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'salaire' => $request->salaire ?? 0, 
          'date_salaire' => $request->date_salaire ?? 29,
          'role' => 'user', 
          'password' => Hash::make($request->password),
      ]);

        event(new Registered($user));

        Auth::login($user); 

        return redirect()->route('user.index' );

        
    }
}
