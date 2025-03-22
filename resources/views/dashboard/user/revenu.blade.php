@extends('layouts.master')
@section('main')
 <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
    <div class="max-w-full p-4 mx-auto lg:p-8">
      {{-- ------------------------------------ Header ------------------------------------ --}}
       <div class="mb-8">
           <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Revenus</h2>
           <p class="text-gray-600">Suivez et gérez votre salaire mensuel</p>
       </div>
      {{-- ---------------------------------- Statistique ----------------------------------- --}}
         <div class="grid grid-cols-1 gap-6 mb-12 md:grid-cols-3">
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Salaire mensuel</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                         <i class="text-green-600 fas fa-money-bill-wave"></i>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">{{ Auth::user()->salaire }} DH</p>
                 <div class="flex items-center mt-2 text-sm text-green-600">
                     <i class="mr-1 fas fa-calendar-check"></i>
                     <span>Crédité le {{ $date_salaire}}</span>
                 </div>
             </div>            
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Prochain versement</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                         <i class="text-blue-600 fas fa-calendar-alt"></i>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">
                    {{ \Carbon\Carbon::createFromFormat('d/m/Y', $date_salaire)->addMonth()->format('d F Y') }}
                 </p>
                 <div class="flex items-center mt-2 text-sm text-blue-600">
                     <i class="mr-1 fas fa-hourglass-half"></i>
                     <span>
                       {{ (\Carbon\Carbon::createFromFormat('d/m/Y', $date_salaire)->addMonth()->day) - \Carbon\Carbon::now()->day }} jours restants
                     </span>
                 </div>
             </div>         
             <div class="p-6 bg-white rounded shadow-sm">
                 <div class="flex items-center justify-between mb-4">
                     <h3 class="font-medium text-gray-500">Total annuel estimé</h3>
                     <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                         <i class="text-purple-600 fas fa-coins"></i>
                     </div>
                 </div>
                 <p class="text-3xl font-bold text-gray-800">{{ Auth::user()->salaire * 12}} DH</p>
                 <div class="flex items-center mt-2 text-sm text-purple-600">
                     <i class="mr-1 fas fa-calculator"></i>
                     <span>Basé sur le salaire actuel</span>
                 </div>
             </div>
         </div>
        {{-- ------------------------------------------------------------------------------------------------------ --}}
         <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
             <h3 class="text-2xl font-bold text-gray-800 lg:text-2xl">Historique des versements</h3>
             <button onclick="openSalaireModal()" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition bg-gray-800 rounded hover:bg-gray-900 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Configurer
            </button>
         </div>
        {{-- ---------------------------------- Table Historique des Salaires ------------------------------------- --}}
         <div class="relative w-full mb-8">
             <div class="w-full p-4 bg-white rounded shadow-sm">
                 <div class="overflow-x-auto">
                     <div class="inline-block min-w-full align-middle">
                         <table class="min-w-full divide-y divide-gray-200">
                             <thead>
                                 <tr class="bg-gray-50">
                                     <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                     <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                                     <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Montant</th>
                                 </tr>
                             </thead>
                             <tbody class="bg-white divide-y divide-gray-200">
                                 @foreach($revenus as $revenu)
                                 <tr>
                                     <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ $revenu->date}}</td>
                                     <td class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $revenu->description }}</td>
                                     <td class="px-4 py-3 text-sm font-medium text-right text-blue-500 whitespace-nowrap">{{ $revenu->montant_salaire }} DH</td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
       {{-- --------------------------------------------------------------------------------------------------------- --}}
        <div class="flex flex-col items-center justify-between px-3 py-3 mt-2 bg-white border-t sm:flex-row sm:px-4">
         <div class="flex justify-between flex-1 sm:hidden">
             @if ($revenus->onFirstPage())
                 <span class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 rounded cursor-default sm:text-sm">
                     Précédent
                 </span>
             @else
                 <a href="{{ $revenus->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
                     Précédent
                 </a>
             @endif
             
             @if ($revenus->hasMorePages())
                 <a href="{{ $revenus->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
                     Suivant
                 </a>
             @else
                 <span class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-500 bg-white border border-gray-300 rounded cursor-default sm:text-sm">
                     Suivant
                 </span>
             @endif
         </div>         
         <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
             <div>
                 <p class="text-xs text-gray-700 sm:text-sm">
                     Affichage de <span class="font-medium">{{ $revenus->firstItem() ?? 0 }}</span> à <span class="font-medium">{{ $revenus->lastItem() ?? 0 }}</span> sur <span class="font-medium">{{ $revenus->total() }}</span> résultats
                 </p>
             </div>            
             <div class="mt-3 sm:mt-0">
                 <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                     @if ($revenus->onFirstPage())
                         <span class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 cursor-default sm:text-sm rounded-l-md">
                             <span class="sr-only">Précédent</span>
                             <i class="fas fa-chevron-left"></i>
                         </span>
                     @else
                         <a href="{{ $revenus->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-l-md hover:bg-gray-50">
                             <span class="sr-only">Précédent</span>
                             <i class="fas fa-chevron-left"></i>
                         </a>
                     @endif
                     
                     @for ($i = 1; $i <= $revenus->lastPage(); $i++)
                         @if ($i == $revenus->currentPage())
                             <span aria-current="page" class="relative z-10 inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-gray-900 border border-gray-900 sm:px-4 sm:text-sm">
                                 {{ $i }}
                             </span>
                         @else
                             <a href="{{ $revenus->url($i) }}" class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:px-4 sm:text-sm hover:bg-gray-50">
                                 {{ $i }}
                             </a>
                         @endif
                     @endfor
                     
                     @if ($revenus->hasMorePages())
                         <a href="{{ $revenus->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-r-md hover:bg-gray-50">
                             <span class="sr-only">Suivant</span>
                             <i class="fas fa-chevron-right"></i>
                         </a>
                     @else
                         <span class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 cursor-default sm:text-sm rounded-r-md">
                             <span class="sr-only">Suivant</span>
                             <i class="fas fa-chevron-right"></i>
                         </span>
                     @endif
                 </nav>
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
    <div id="toast-edit" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up z-50">
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