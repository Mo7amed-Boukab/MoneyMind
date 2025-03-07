@extends('layouts.master')

@section('main')
<div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
  <div class="p-6 mx-auto lg:p-8 max-w-7xl">
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Mon Profil</h2>
      <p class="text-gray-600">Gérez vos informations personnelles et vos préférences</p>
    </div>

    <div class="grid grid-cols-1 gap-6">
      <div class="p-6 bg-white rounded shadow-sm">
        <form method="post" action="" class="space-y-6">
          @csrf
          @method('patch')

          <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="name">Nom complet</label>
              <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" 
                class="w-full px-3 py-2 border rounded-md">
              @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="email">Email</label>
              <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                class="w-full px-3 py-2 border rounded-md">
              @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="phone">Téléphone</label>
              <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}"
                class="w-full px-3 py-2 border rounded-md">
              @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="salary">Salaire mensuel fixe</label>
              <input type="number" name="salary" id="salary" value="{{ Auth::user()->salaire}}"
                class="w-full px-3 py-2 border rounded-md">
              @error('salary')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="pt-4 border-t">
            <h4 class="mb-4 text-lg font-medium text-gray-800">Modifier le mot de passe</h4>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-700" for="current_password">
                  Mot de passe actuel
                </label>
                <input type="password" name="current_password" id="current_password"
                  class="w-full px-3 py-2 border rounded-md">
                @error('current_password')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label class="block mb-2 text-sm font-medium text-gray-700" for="password">
                  Nouveau mot de passe
                </label>
                <input type="password" name="password" id="password"
                  class="w-full px-3 py-2 border rounded-md">
                @error('password')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label class="block mb-2 text-sm font-medium text-gray-700" for="password_confirmation">
                  Confirmer le mot de passe
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                  class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
              </div>
            </div>
          </div>

          <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
              Enregistrer les modifications
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection 