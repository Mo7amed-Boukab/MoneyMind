@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex items-center justify-between mb-8 md:flex-row">
          <div class="mt-4 md:mt-0">
            <h2 class="text-xl font-bold text-gray-800 md:text-2xl lg:text-3xl">Tableau de bord</h2>
            <p class="text-sm text-gray-600 md:text-base">Bonjour, {{ Auth::user()->name }}! Voici votre situation au {{ now()->format('d F Y') }}</p>
          </div>
            <!-- User Profile & Notifications -->
            <div class="flex items-center space-x-4">
             <div onclick="toggleNotifications()" class="relative cursor-pointer">
               <i class="text-xl text-gray-600 fas fa-bell"></i>
               @if ($countNotifications > 0)
                   <div class="absolute flex items-center justify-center w-4 h-4 bg-red-500 rounded-full -top-1 -right-1">
                     <span class="text-xs text-white">{{ $countNotifications }}</span>
                   </div>
               @endif
             </div>
             <div class="relative flex items-center justify-center cursor-pointer group">
              <div class="flex items-center">
                <div class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-blue-950">
                  <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                </div>
                <div class="hidden px-4 py-2 border-b border-gray-100 lg:block">
                  <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                  <p class="text-xs text-gray-500">Compte Administrateur</p>
                </div>
              </div>
            </div>
            <div id="notificationList" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0" onclick="closeNotifications()"></div>
                <div class="absolute right-4 top-20 w-80 bg-white rounded shadow-lg max-h-[80vh] flex flex-col">
                    <div class="flex flex-col flex-1 py-2">
                        <h3 class="px-4 py-2 text-sm font-medium text-gray-700 border-b">Notifications</h3>
                        <div class="flex-1 overflow-y-auto max-h-60">
                            @if (count($notifications) > 0)
                                @foreach ($notifications as $notification)
                                    <div class="block px-4 py-3 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                @if ($notification->importance == 1)
                                                    <i class="text-red-500 fas fa-exclamation-circle"></i>
                                                @else
                                                    <i class="text-blue-500 fas fa-info-circle"></i>
                                                @endif
                                            </div>
                                            <div class="flex-1 ml-3">
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $notification->titre }}</p>
                                                <p class="text-sm text-gray-500">{{ $notification->message }}</p>
                                                <p class="mt-1 text-xs text-gray-400">
                                                    {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            <form action="{{ route('admin.notification.lu', $notification->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="ml-2 text-gray-400 hover:text-gray-600">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="px-4 py-3 text-center text-gray-500">
                                    Aucune notification pour le moment.
                                </div>
                            @endif
                        </div>
                        <div class="py-2 mt-auto text-center border-t">
                            <a href="{{ route('admin.notification') }}"
                                class="text-sm font-medium text-blue-600 hover:text-blue-800">
                                Voir toutes les notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
      </div>
        <!-- Statistics Cards -->
       <div class="grid grid-cols-1 gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-3">
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Utilisateurs totaux</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                <i class="text-blue-700 fas fa-users"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{ number_format($totalUsers, 0, ',', ' ') }}</p>
            <div class="flex items-center mt-2 text-xs md:text-sm {{ $usersEvolution >= 0 ? 'text-blue-600' : 'text-red-700' }}">
              <i class="mr-1 fas {{ $usersEvolution >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
              <span>{{ abs($usersEvolution) }}% depuis le mois dernier</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Revenu moyen</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                <i class="text-green-600 fas fa-money-bill-wave"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">
              {{ number_format($salaireMoyenne, 0, ',', ' ') }} DH
            </p>
            <div class="flex items-center mt-2 text-xs md:text-sm {{ $salaireEvolution >= 0 ? 'text-green-600' : 'text-red-600' }}">
              <i class="mr-1 fas {{ $salaireEvolution >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
              <span>{{ abs($salaireEvolution) }}% depuis le mois dernier</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Comptes inactifs</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                <i class="text-red-600 fas fa-user-clock"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{ $usersInactive }}</p>
            <div class="flex items-center mt-2 text-xs text-red-600 md:text-sm">
              <i class="mr-1 fas fa-exclamation-circle"></i>
              <span>Inactifs depuis 2 mois</span>
            </div>
          </div>
        </div>
        
        <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-2">
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">Derniers utilisateurs</h3>
              <a href="{{route("admin.users")}}" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
            </div>
            <div class="overflow-x-auto">
              <table class="min-w-full table-fixed">
                <thead>
                  <tr class="border-b bg-gray-50">
                    <th class="w-2/5 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Utilisateur</th>
                    <th class="w-2/5 px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Status</th>
                    <th class="w-1/5 px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase ">Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($users as $user)
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                          <span>{{$user->name[0].$user->name[1]}}</span>
                        </div>
                        <div class="ml-3">
                          <div class="text-sm font-medium text-gray-900">{{$user->name}}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                       <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-700 bg-yellow-100 rounded-full'}}">
                          {{ ucfirst($user->status) }}
                     </span>
                   </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                      <button onclick="openConfirmationModal({{$user->id}})" 
                              class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">
                          Supprimer
                      </button>
                    </td>
                  </tr>
                  @endforeach  
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">Dernières catégories</h3>
              <a href="{{route("admin.categorie")}}" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
            </div>
            <div class="overflow-x-auto">
              <table class="min-w-full table-fixed">
                <thead>
                  <tr class="border-b bg-gray-50">
                    <th class="w-2/5 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                    <th class="w-2/5 px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">% Dépenses</th>
                    <th class="w-1/5 px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($categories as $categorie)
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 text-green-600 bg-green-100 rounded-full">
                          <i class="fas fa-tag"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{$categorie->name}}</span>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                      {{$categorie->pourcentage}}%
                    </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                      <div class="flex justify-center space-x-2">
                        <button onclick="openEditModal({{$categorie->id}})" 
                                class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                            Modifier
                        </button>
                        <button onclick="openConfirmationModal({{$categorie->id}})"
                                class="px-3 py-1 text-white bg-gray-500 rounded hover:bg-gray-600">
                            Supprimer
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modal')
    @foreach($users as $user)
    <div id="delete{{$user->id}}" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <div class="relative z-50 w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Confirmer la suppression</h3>
                    <button onclick="closeConfirmationModal({{$user->id}})" class="absolute text-gray-400 top-4 right-4 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-gray-500">
                        Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.
                    </p>
                </div>
                <div class="flex justify-end space-x-3">
                    <button onclick="closeConfirmationModal({{$user->id}})"
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Annuler
                    </button>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('dashboard.admin.modals.editCategorieModal')
    @include('dashboard.admin.modals.deleteConfirmationModal')
@endsection

@section('toast')
    @if (session('update'))
    <div id="toast-edit" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-600 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V14h3.828l7.586-7.586a2 2 0 000-2.828l-1-1zM6 16a1 1 0 100 2h8a1 1 0 100-2H6z"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('update') }}</div>
        <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-edit')">
            <span class="sr-only">Fermer</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif

    @if (session('delete'))
    <div id="toast-delete" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-red-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-red-600 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 010 2H2a1 1 0 010-2h3V2zM4 7h12v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('delete') }}</div>
        <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-delete')">
            <span class="sr-only">Fermer</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif

    @if (session('error'))
    <div id="toast-error" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-yellow-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-yellow-600 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
    </div>
    @endif
@endsection
@section('script')
<script>

      function toggleNotifications() {
          const notificationList = document.getElementById('notificationList');
          if (notificationList.classList.contains('hidden')) {
              notificationList.classList.remove('hidden');
          } else {
              closeNotifications();
          }
      }
      function closeNotifications() {
          const notificationList = document.getElementById('notificationList');
          notificationList.classList.add('hidden');
      }
      // -----------------------------------------------------------------------
      function closeToast(id) {
          document.getElementById(id).style.display = 'none';
      }
      setTimeout(() => {
          document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
      }, 5000);

    function openEditModal(id) {
        document.getElementById(`editCategorieModal${id}`).classList.remove('hidden');
    }
    
    function closeEditModal(id) {
        document.getElementById(`editCategorieModal${id}`).classList.add('hidden');
    }

    function openConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.remove('hidden');
    }
    
    function closeConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.add('hidden');
    }

    function closeToast(id) {
        document.getElementById(id).style.display = 'none';
    }
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
    }, 5000);
</script>
@endsection