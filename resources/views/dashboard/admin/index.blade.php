@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex items-center justify-between mb-8 md:flex-row">
          <div class="mt-4 md:mt-0">
            <h2 class="text-xl font-bold text-gray-800 md:text-2xl lg:text-3xl">Tableau de bord</h2>
            <p class="text-sm text-gray-600 md:text-base">Bonjour, mohamed! Voici votre situation au 13/03/2025</p>
          </div>
            <!-- User Profile & Notifications -->
            <div class="flex items-center space-x-4">
             <div onclick="openNotifications()" class="relative cursor-pointer">
               <i class="text-xl text-gray-600 fas fa-bell"></i>
               <div class="absolute flex items-center justify-center w-4 h-4 bg-red-500 rounded-full -top-1 -right-1">
                 <span class="text-xs text-white">2</span>
               </div>
             </div>
             <div class="relative flex items-center justify-center cursor-pointer group">
              <div class="flex items-center">
                <div class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-blue-950">
                  <span>Mo</span>
                </div>
                <div class="hidden px-4 py-2 border-b border-gray-100 lg:block">
                  <p class="font-medium text-gray-800">mohamed</p>
                  <p class="text-xs text-gray-500">Compte Administrateur</p>
                </div>
              </div>
            </div>
               <!-- Notification-->
               <div id="notificationList" class="relative hidden ml-3">
               
                <div class="absolute right-0 z-50 mt-8 bg-white rounded-md shadow-lg w-80">
                  <div class="py-2">
                    <h3 class="px-4 py-2 text-sm font-medium text-gray-700 border-b">Notifications</h3>
                    
                    <div class="overflow-y-auto max-h-64">
                      <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                        <div class="flex items-center">
                          <div class="flex-shrink-0">
                            <i class="text-blue-500 fas fa-check-circle"></i>
                          </div>
                          <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Nouvelle inscription</p>
                            <p class="text-sm text-gray-500">Un nouveau utilisateur s'inscrit</p>
                            <p class="mt-1 text-xs text-gray-400">Il y a 1 heures</p>
                          </div>
                        </div>
                      </a>
 
                      <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                        <div class="flex items-center">
                          <div class="flex-shrink-0">
                            <i class="text-red-500 fas fa-exclamation-circle"></i>
                          </div>
                          <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Cas inactive détecté</p>
                            <p class="text-sm text-gray-500">Un utilisteur inactive plus de 2 mois</p>
                            <p class="mt-1 text-xs text-gray-400">Il y a 1 jour</p>
                          </div>
                        </div>
                      </a>
                    </div>
 
                    <div class="py-2 text-center border-t">
                      <a href="" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                        Voir toutes les notifications
                      </a>
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
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">7</p>
            <div class="flex items-center mt-2 text-xs md:text-sm text-blue-600">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>5% depuis le mois dernier</span>
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
              6500 DH
            </p>
            <div class="flex items-center mt-2 text-xs md:text-sm text-green-600">
              <i class="mr-1 fas fa-arrow-up'"></i>
              <span>10% depuis le mois dernier</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Comptes inactifs</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                <i class="text-red-600 fas fa-user-clock"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">2</p>
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
              <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
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
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                          <span>me</span>
                        </div>
                        <div class="ml-3">
                          <div class="text-sm font-medium text-gray-900">med boukab</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                       <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-700 bg-yellow-100 rounded-full'}}">
                          active
                     </span>
                   </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                      <button class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">
                          Supprimer
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">Dernières catégories</h3>
              <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
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
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 text-green-600 bg-green-100 rounded-full">
                          <i class="fas fa-tag"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Facture</span>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                      10%
                    </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                      <div class="flex justify-center space-x-2">
                        <button class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                            Modifier
                        </button>
                        <button class="px-3 py-1 text-white bg-gray-500 rounded hover:bg-gray-600">
                            Supprimer
                        </button>
                      </div>
                    </td>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



@section('script')
<script>
    
    function openNotifications()
   {
      const notificationList = document.getElementById('notificationList');
            notificationList.classList.toggle('hidden');
   }

</script>
@endsection