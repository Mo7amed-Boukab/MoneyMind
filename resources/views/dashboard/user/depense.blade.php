@extends('layouts.master')
@section('main')
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
      {{-- ------------------------------------- Header --------------------------------------- --}}
         <div class="flex flex-col items-start justify-between mb-8 md:flex-row md:items-center">
             <div>
              <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Dépenses</h2>
              <p class="text-gray-600">Suivez et gérez toutes vos dépenses en un seul endroit</p>
            </div>
        </div>
      {{-- ---------------------------------- Statistiques ------------------------------------- --}}
      <div class="grid grid-cols-1 gap-4 mb-12 lg:grid-cols-3">
         <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses totales</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-red-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-red-600 fas fa-shopping-cart"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">{{$totalDepenses}} DH</p>
            <div class="flex items-center mt-2 text-xs text-red-600 sm:text-sm">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>{{number_format(($totalDepenses * 100) / $userSalaire,2)}}% du salaire dépensé</span>
            </div>
          </div>        
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses récurrentes</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-blue-600 fas fa-sync-alt"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">{{$totalDepensesRecurrente}} DH</p>
            <div class="flex items-center mt-2 text-xs text-blue-600 sm:text-sm">
              <i class="mr-1 fas fa-info-circle"></i>
              <span>{{number_format(($totalDepensesRecurrente * 100) / $userSalaire,2)}}% du salaire</span>
            </div>
          </div>        
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses non recurrente</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-purple-600 fas fa-receipt"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">{{$totalDepensesNonRecurrente = $totalDepenses - $totalDepensesRecurrente}} DH</p>
            <div class="flex items-center mt-2 text-xs text-purple-600 sm:text-sm">
              <i class="mr-1 fas fa-info-circle"></i>
              <span>{{number_format(($totalDepensesNonRecurrente * 100) / $userSalaire,2)}}% du salaire</span>
            </div>
          </div>
        </div>
        {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}
        <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">   
            <div>
               <h3 class="text-2xl font-bold text-gray-800 lg:text-2xl">Dépenses Récurrente</h3>
           </div>
            <button onclick="openModalAddDepense()" class="flex items-center justify-center px-4 py-2 mt-2 text-sm text-white bg-red-600 rounded sm:px-4 transiton hover:bg-red-700 focus:outline-none sm:mt-0 sm:w-auto">
              <i class="mr-2 fas fa-plus"></i>Ajouter une dépense
            </button>
        </div>
        {{-- -----------------------------------------------  Table des Dépenses Récurrente ---------------------------------------------- --}}
        <div class="relative w-full mb-8">
            <div class="w-full p-4 bg-white rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Montant</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($depenses as $depense)
                                <tr class="border-b hover:bg-gray-50">
                                 <td class="px-4 py-3 sm:px-4 whitespace-nowrap">
                                   <div class="flex items-center">
                                     <div>
                                       <div class="text-xs font-medium text-gray-900 sm:text-sm">{{ $depense->description }}</div>
                                     </div>
                                   </div>
                                 </td>
                                 <td class="px-4 py-3 sm:px-4 whitespace-nowrap">
                                   <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">
                                    {{ $depense->categorie->name}}
                                   </span>
                                 </td>
                                 <td class="px-4 py-3 text-xs text-gray-500 sm:px-4 sm:text-sm whitespace-nowrap">
                                  {{ \Carbon\Carbon::parse($depense->date_paiement)->format('d F Y') }}
                                 </td>
                                 <td class="px-4 py-3 text-xs font-medium text-right text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                  {{ $depense->montant_depense }} DH
                                 </td>
                                 <td class="px-4 py-3 text-xs text-center sm:px-4 sm:text-sm whitespace-nowrap">
                                      <button onclick="openEditDepenseModal({{$depense->id}})" class="p-1 text-blue-600 hover:text-blue-800">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                      <button onclick="openConfirmationModal({{$depense->id}})" class="p-1 text-red-600 hover:text-red-800">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                 </td>
                                </tr>
                                @endforeach 
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{---------------------------------------------------------------------------------------------------------------------------------}}
        <div class="flex flex-col items-center justify-between px-3 py-3 mt-2 bg-white border-t sm:flex-row sm:px-4">
         <div class="flex justify-between flex-1 sm:hidden">
             @if ($depenses->onFirstPage())
                 <span class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 rounded cursor-default sm:text-sm">
                     Précédent
                 </span>
             @else
                 <a href="{{ $depenses->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
                     Précédent
                 </a>
             @endif

             @if ($depenses->hasMorePages())
                 <a href="{{ $depenses->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
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
                     Affichage de <span class="font-medium">{{ $depenses->firstItem() ?? 0 }}</span> à <span class="font-medium">{{ $depenses->lastItem() ?? 0 }}</span> sur <span class="font-medium">{{ $depenses->total() }}</span> résultats
                 </p>
             </div>             
             <div class="mt-3 sm:mt-0">
                 <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                     @if ($depenses->onFirstPage())
                         <span class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 cursor-default sm:text-sm rounded-l-md">
                             <span class="sr-only">Précédent</span>
                             <i class="fas fa-chevron-left"></i>
                         </span>
                     @else
                         <a href="{{ $depenses->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-l-md hover:bg-gray-50">
                             <span class="sr-only">Précédent</span>
                             <i class="fas fa-chevron-left"></i>
                         </a>
                     @endif
                     
                     @for ($i = 1; $i <= $depenses->lastPage(); $i++)
                         @if ($i == $depenses->currentPage())
                             <span aria-current="page" class="relative z-10 inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-gray-900 border border-gray-900 sm:px-4 sm:text-sm">
                                 {{ $i }}
                             </span>
                         @else
                             <a href="{{ $depenses->url($i) }}" class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:px-4 sm:text-sm hover:bg-gray-50">
                                 {{ $i }}
                             </a>
                         @endif
                     @endfor
                     
                     @if ($depenses->hasMorePages())
                         <a href="{{ $depenses->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-r-md hover:bg-gray-50">
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
  @include('dashboard.user.modals.addDepenseModal')
  @include('dashboard.user.modals.editDepenseModal')
  @include('dashboard.user.modals.deleteConfirmationModal')
@endsection

@section('toast')
    @if (session('add'))
    <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-500 rounded shadow-lg bottom-4 right-4 animate-slide-up z-50">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-600 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('add') }}</div>
        <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-success')">
            <span class="sr-only">Fermer</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif

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

    @if (session('delete'))
    <div id="toast-delete" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-red-500 rounded shadow-lg bottom-4 right-4 animate-slide-up z-50">
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
    const depenseModal = document.getElementById('addDepenseModal');
    function openModalAddDepense(){
       depenseModal.classList.remove('hidden');
       depenseModal.classList.add('flex');
    }
    function closeDepenseModal(){
       depenseModal.classList.remove('flex');
       depenseModal.classList.add('hidden');
    }
    function cancelDepenseModal(){
       depenseModal.classList.remove('flex');
       depenseModal.classList.add('hidden');
    }
  // ---------------------------------------------------------------
    function openEditDepenseModal(id) {
          const modal = document.getElementById(`editDepense${id}`);
          modal.classList.remove('hidden');
          modal.classList.add('flex');
      }
    function openConfirmationModal(id) {
          const modal = document.getElementById(`delete${id}`);
          modal.classList.remove('hidden');
          modal.classList.add('flex');
      }
    function closeEditDepenseModal(id) {
          const modal = document.getElementById(`editDepense${id}`);
          modal.classList.remove('flex');
          modal.classList.add('hidden');
    }
    function cancelEditDepenseModal(id) {
          const modal = document.getElementById(`editDepense${id}`);
          modal.classList.remove('flex');
          modal.classList.add('hidden');
    }
    function closeConfirmationModal(id) {
          const modal = document.getElementById(`delete${id}`);
          modal.classList.remove('flex');
          modal.classList.add('hidden');
    }
    function cancelConfirmationModal(id) {
          const modal = document.getElementById(`delete${id}`);
          modal.classList.remove('flex');
          modal.classList.add('hidden');
    }
  // --------------------------------------------------------------
    function closeToast(id) {
          document.getElementById(id).style.display = 'none';
      }
      setTimeout(() => {
          document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
      }, 5000);     
 </script>
@endsection