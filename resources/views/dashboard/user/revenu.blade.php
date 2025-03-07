@extends('layouts.master')

@section('main')
   
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
         <div class="flex flex-col items-start justify-between mb-6 md:flex-row md:items-center">
             <div>
                 <h2 class="text-3xl font-bold text-gray-800">Gestion des Revenus</h2>
                 <p class="text-gray-600">Suivez et gérez votre salaire mensuel</p>
             </div>
         </div>

         <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Salaire mensuel</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">{{ Auth::user()->salaire }} DH</p>
                 <div class="flex items-center mt-2 text-sm text-green-600">
                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                     <span>Crédité le {{ $date_salaire}}</span>
                 </div>
             </div>
             
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Prochain versement</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">
                  {{ \Carbon\Carbon::createFromFormat('d/m/Y', $date_salaire)->addMonth()->format('d F Y') }}
                 </p>
                 <div class="flex items-center mt-2 text-sm text-blue-600">
                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="17" y1="7" x2="7" y2="17"></line><polyline points="7 7 7 17 17 17"></polyline></svg>
                     <span>
                       {{ (\Carbon\Carbon::createFromFormat('d/m/Y', $date_salaire)->addMonth()->day) - \Carbon\Carbon::now()->day }} jours restants
                     </span>
                 </div>
             </div>
             
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Total annuel estimé</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">{{ Auth::user()->salaire * 12}} DH</p>
                 <div class="flex items-center mt-2 text-sm text-purple-600">
                     <span>Basé sur le salaire actuel</span>
                 </div>
             </div>
         </div>

         <!-- Configuration du Salaire -->
          <!-- Configuration du Salaire -->
          <div class="p-6 mb-8 bg-white rounded shadow-sm">
           <div class="flex items-center justify-between mb-6">
               <h3 class="text-xl font-bold text-gray-800">Configuration du Salaire</h3>
           </div>
           <div class="grid gap-6 md:grid-cols-2">
               <div class="flex items-center">
                   <div class="flex-1">
                       <label class="block mb-2 text-sm font-medium text-gray-700">Montant du salaire</label>
                       <input type="text" id="salaryAmount" value="{{ Auth::user()->salaire}} DH" class="w-full px-3 py-2 text-gray-700 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" disabled>
                   </div>
               </div>
               <div class="flex items-center">
                   <div class="flex-1">
                       <label class="block mb-2 text-sm font-medium text-gray-700">Jour du versement du salaire</label>
                       <input type="text" id="salaryDate" value="{{ Auth::user()->date_salaire}}" class="w-full px-3 py-2 text-gray-700 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" disabled>
                   </div>
                   <button onclick="openSalaireModal()" class="flex items-center px-4 py-2 mt-6 ml-4 text-sm font-medium text-white transition rounded bg-blue-600/80 hover:bg-blue-600/90 focus:outline-none">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       Modifier
                   </button>
               </div>
           </div>
       </div>

         <!-- Historique des versements -->
         <div class="p-6 bg-white rounded shadow-sm">
          <div class="flex items-center justify-between mb-6">
              <h3 class="text-xl font-bold text-gray-800">Historique des versements</h3>
              <div class="relative">
                  <input type="text" placeholder="Rechercher..." class="block w-full px-4 py-2 pl-10 text-gray-700 bg-gray-100 border-none rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                  </div>
              </div>
          </div>
          <div class="overflow-x-auto">
              <table class="min-w-full">
                  <thead>
                      <tr class="border-b bg-gray-50">
                          <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                          <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                          <th class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Montant</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($revenus as $revenu)
                      <tr class="border-b hover:bg-gray-50">
                          <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ $revenu->date}}</td>
                          <td class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $revenu->description }}</td>
                          <td class="px-4 py-3 text-sm font-medium text-right text-blue-500 whitespace-nowrap">{{ $revenu->montant_salaire }} DH</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
             <!-- Pagination -->
             <div class="flex items-center justify-between px-4 py-3 bg-white border-t sm:px-6">
                 <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                     <div>
                         <p class="text-sm text-gray-700">
                             Affichage de <span class="font-medium">1</span> à <span class="font-medium">5</span> sur <span class="font-medium">12</span> résultats
                         </p>
                     </div>
                     <div>
                         <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                             <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                                 <span class="sr-only">Précédent</span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                             </a>
                             <a href="#" aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900">
                                 1
                             </a>
                             <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                                 2
                             </a>
                             <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                                 3
                             </a>
                             <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                                 <span class="sr-only">Suivant</span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                             </a>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 
@endsection

@section('modal')
  @include('dashboard.user.modals.salaireModal')
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
@endsection

@section('script')
<script>

   const salaireModal = document.getElementById("salaireModal");
    
   function openSalaireModal()
   {
      salaireModal.classList.remove('hidden');
      salaireModal.classList.add('flex');
   }
  function closeSalaireModal()
  {
     salaireModal.classList.remove('flex');
     salaireModal.classList.add('hidden');
  }
  function cancelSalaireModal(){
     salaireModal.classList.remove('flex');
     salaireModal.classList.add('hidden');
  }
// --------------------------------------------
  function closeToast(id) {
        document.getElementById(id).style.display = 'none';
    }
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
    }, 5000);
</script>
@endsection