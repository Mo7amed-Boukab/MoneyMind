@extends('layouts.master')

@section('main')
   
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
         <div class="flex flex-col items-start justify-between mb-6 md:flex-row md:items-center">
             <div>
             <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Centre de Notifications</h2>
             <p class="text-gray-600 ">Restez informé des événements importants concernant vos finances</p>
           </div>
        </div>

        <!-- Tabs for Notifications -->
        <div class="mb-6 border-b border-gray-200">
          <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
            <li class="mr-2">
              <a href="#" class="inline-block p-4 text-green-800 border-b-2 border-green-800 rounded-t-lg active">
                <i class="mr-2 fas fa-bell"></i>Toutes (3)
              </a>
            </li>
            <li class="mr-2">
              <a href="#" class="inline-block p-4 text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                <i class="mr-2 text-red-500 fas fa-exclamation-circle"></i>Importantes (1)
              </a>
            </li> 
          </ul>
        </div>
        
        <!-- Notifications List -->
        <div class="mb-8 space-y-4">
          <!-- Notification 1 - (Alert) -->
          <div class="p-4 bg-white border-l-4 border-red-500 rounded shadow-sm">
            <div class="flex items-start">
              <div class="flex items-center justify-center w-10 h-10 mr-4 bg-red-100 rounded-full">
                <i class="text-red-600 fas fa-exclamation-circle"></i>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                  <h4 class="text-lg font-medium text-gray-800">Dépassement de budget</h4>
                  <span class="text-xs text-gray-500">Aujourd'hui, 10:23</span>
                </div>
                <p class="mb-2 text-gray-600">Vous avez dépassé votre budget mensuel de 300 DH (112% utilisé). Réduisez vos dépenses pour le reste du mois.</p>
                <div class="flex items-center justify-between">
                  <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                    Marquer comme lu
                  </button>
                  <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Important</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Notification 2 - (Information) -->
          <div class="p-4 bg-white border-l-4 border-blue-500 rounded shadow-sm">
            <div class="flex items-start">
              <div class="flex items-center justify-center w-10 h-10 mr-4 bg-blue-100 rounded-full">
                <i class="text-blue-600 fas fa-folder-plus"></i>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                  <h4 class="text-lg font-medium text-gray-800">Nouvelle catégorie disponible</h4>
                  <span class="text-xs text-gray-500">Hier, 15:45</span>
                </div>
                <p class="mb-2 text-gray-600">Une nouvelle catégorie "Abonnements numériques" a été ajoutée. Vous pouvez maintenant classer vos dépenses liées aux services en ligne.</p>
                <div class="flex items-center justify-between">
                  <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                    Marquer comme lu
                  </button>
                  <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">Information</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Notification 3 - (Information) -->
          <div class="p-4 bg-white border-l-4 border-blue-500 rounded shadow-sm">
            <div class="flex items-start">
              <div class="flex items-center justify-center w-10 h-10 mr-4 bg-blue-100 rounded-full">
                <i class="text-blue-600 fas fa-sync-alt"></i>
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                  <h4 class="text-lg font-medium text-gray-800">Mise à jour de dépense fixe</h4>
                  <span class="text-xs text-gray-500">Il y a 3 jours</span>
                </div>
                <p class="mb-2 text-gray-600">Votre dépense fixe "Loyer" a été mise à jour de 2500 DH à 2600 DH. Cette modification sera prise en compte dans vos prochains budgets.</p>
                <div class="flex items-center justify-between">
                  <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                    Marquer comme lu
                  </button>
                  <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">Information</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
  
  </script>
@endsection