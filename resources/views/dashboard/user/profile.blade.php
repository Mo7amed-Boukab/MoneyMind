@extends('layouts.master')

@section('main')
<div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
  <div class="p-6 mx-auto lg:p-8 max-w-7xl">
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Mon Profil</h2>
      <p class="text-gray-600">Gérez vos informations personnelles et vos préférences</p>
    </div>

    <div class="grid grid-cols-1 gap-6">
      <!-- Informations du profil -->
      <div class="p-6 bg-white rounded shadow-sm">
        <h3 class="mb-4 text-lg font-medium text-gray-800">Informations personnelles</h3>
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
          @csrf
          @method('patch')

          <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="name">Nom complet</label>
              <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" 
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="email">Email</label>
              <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="phone">Téléphone</label>
              <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="salaire">Salaire mensuel fixe</label>
              <input type="number" name="salaire" id="salaire" value="{{ Auth::user()->salaire }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('salaire')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
              Enregistrer les modifications
            </button>
          </div>
        </form>
      </div>

      <!-- Mise à jour du mot de passe -->
      <div class="p-6 bg-white rounded shadow-sm">
        <h3 class="mb-4 text-lg font-medium text-gray-800">Modifier le mot de passe</h3>
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
          @csrf
          @method('put')

          <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="current_password">
                Mot de passe actuel
              </label>
              <input type="password" name="current_password" id="current_password"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('current_password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="password">
                Nouveau mot de passe
              </label>
              <input type="password" name="password" id="password"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
              @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-700" for="password_confirmation">
                Confirmer le mot de passe
              </label>
              <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800">
            </div>
          </div>

          <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
              Mettre à jour le mot de passe
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

@if (session('status') === 'profile-updated')
  <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-600 rounded">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div class="ml-3 text-sm font-normal">Profil mis à jour avec succès</div>
    <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-success')">
      <span class="sr-only">Fermer</span>
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
@endif

@if (session('status') === 'password-updated')
  <div id="toast-password" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-600 rounded">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div class="ml-3 text-sm font-normal">Mot de passe mis à jour avec succès</div>
    <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-password')">
      <span class="sr-only">Fermer</span>
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
@endif
@endsection

@section('script')
<script>
  function closeToast(id) {
    document.getElementById(id).style.display = 'none';
  }
  setTimeout(() => {
    document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
  }, 5000);
</script>
@endsection 