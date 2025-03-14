@extends('layouts.master')

@section('main')
   
   <!-- Main Content -->
   <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
    <div class="p-6 mx-auto lg:p-8 max-w-7xl">
        <div class="flex items-center justify-between mb-8 md:flex-row">
            <div class="mt-4 md:mt-0">
                <h2 class="text-xl font-bold text-gray-800 md:text-2xl lg:text-3xl">Tableau de bord</h2>
                <p class="text-sm text-gray-600 md:text-base">Bonjour, med! Voici votre situation au 14/03/2025</p>
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
                 <span>me</span>
               </div>
               <div class="hidden px-4 py-2 border-b border-gray-100 lg:block">
                 <p class="font-medium text-gray-800">med</p>
                 <p class="text-xs text-gray-500">Compte Personnel</p>
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
                           <p class="text-sm font-medium text-gray-900">Objectif d'épargne atteint</p>
                           <p class="text-sm text-gray-500">Vous avez atteint votre objectif mensuel</p>
                           <p class="mt-1 text-xs text-gray-400">Il y a 2 heures</p>
                         </div>
                       </div>
                     </a>

                     <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                       <div class="flex items-center">
                         <div class="flex-shrink-0">
                           <i class="text-red-500 fas fa-exclamation-circle"></i>
                         </div>
                         <div class="ml-3">
                           <p class="text-sm font-medium text-gray-900">Dépense récurrente à venir</p>
                           <p class="text-sm text-gray-500">Abonnement Netflix - échéance dans 3 jours</p>
                           <p class="mt-1 text-xs text-gray-400">Il y a 1 jour</p>
                         </div>
                       </div>
                     </a>
                   </div>

                   <div class="py-2 text-center border-t">
                     <a href="{{route('user.notification')}}" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                       Voir toutes les notifications
                     </a>
                   </div>
                 </div>
               </div>
              </div>
              
          </div>

          
        </div>

        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Solde total actuel</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                <i class="text-green-700 fas fa-money-bill-wave"></i>
              </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">7000 DH</p>
            <div class="flex items-center mt-2 text-sm text-green-700">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>80% du salaire restant</span>
            </div>
          </div>
          
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Dépenses totales</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                <i class="text-red-600 fas fa-shopping-cart"></i>
              </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">2000 DH</p>
            <div class="flex items-center mt-2 text-sm text-red-600">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>20% du salaire dépensé</span>
            </div>
          </div>
          
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Prochain salaire</h3>
              <div class="flex items-center justify-center w-10 h-10 rounded-full bg-extra-light-blue">
                <i class="text-blue-600 fas fa-calendar"></i>
              </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">9000 DH</p>
            <div class="flex items-center mt-2 text-sm text-blue-600">
              <i class="mr-1 fas fa-clock"></i>
              <span>16 jours restants</span>
            </div>
          </div>
        </div>

        <!-- IA Conseils -->
        <div class="p-4 mb-8 border-l-4 border-blue-600 rounded-lg shadow-sm bg-gradient-to-r from-blue-100 to-blue-50">
          <div class="flex">
            <div class="flex-shrink-0">
              <i class="text-2xl text-blue-600 fas fa-robot"></i>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-blue-600">Suggestion de MoneyMind IA</h3>
              <p class="text-blue-600">Vous devriez réduire vos dépenses de divertissement de 10%.</p>
            </div>
          </div>
        </div>


        <!-- Charts Section -->
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2">
         <div class="p-6 bg-white rounded shadow-sm">
           <h3 class="mb-4 text-xl font-bold text-gray-800">Évolution des dépenses</h3>
           <div style="height: 300px;">
             <canvas id="expensesEvolutionChart"></canvas>
           </div>
         </div>
         <div class="p-6 bg-white rounded shadow-sm">
           <h3 class="mb-4 text-xl font-bold text-gray-800">Répartition des dépenses</h3>
           <div style="height: 300px;">
             <canvas id="expensesChart"></canvas>
           </div>
         </div>
        </div>

      </div>
    </div>
  </div>

  @endsection
@section('script')
  <script>
  function openNotifications() {
      const notificationList = document.getElementById('notificationList');
      notificationList.classList.toggle('hidden');
  }
  
  const ctx = document.getElementById('expensesEvolutionChart').getContext('2d');
  new Chart(ctx, {
      type: 'bar', 
      data: {
          labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'], 
          datasets: [{
              label: 'Évolution des dépenses (DH)',
              data: [500, 700, 1200, 900, 1500, 1800], 
              borderColor: 'rgba(59, 130, 246, 1)',
              backgroundColor: 'rgba(59, 130, 246, 0.2)',
              borderWidth: 2
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
      }
  });

  const ctx2 = document.getElementById('expensesChart').getContext('2d');
  new Chart(ctx2, {
      type: 'doughnut',
      data: {
          labels: ['Alimentation', 'Loyer', 'Transport', 'Divertissement'], 
          datasets: [{
              data: [1200, 2500, 600, 900], 
              backgroundColor: ['#2563EB', '#F59E0B', '#10B981', '#EF4444'],
              borderColor: "#fff", 
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '70%',
      }
  });
  </script>
@endsection
