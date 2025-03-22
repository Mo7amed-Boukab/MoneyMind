@extends('layouts.master')
@section('main')
<div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
      {{-- -------------------------------------- Header ----------------------------------------- --}}
         <div class="mb-8">
               <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion d'Épargne</h2>
               <p class="text-gray-600">Planifiez vos objectifs financiers et suivez votre progression</p>
         </div>
      {{-- ------------------------------------- Statistique ------------------------------------- --}}
      <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3 md:gap-6 md:mb-16">
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne totale</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                      <i class="text-green-600 fas fa-wallet"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">{{number_format($epargne_total, 2)}} DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-green-600"><i class="mr-1 fas fa-arrow-up"></i> +{{$epargne_mensuel}} DH</span>
                  <span class="ml-2 text-gray-500">ce mois-ci</span>
              </div>
          </div>
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne mensuel</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                      <i class="text-blue-600 fas fa-calendar-alt"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">{{number_format($epargne_mensuel, 2)}} DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-blue-600"><i class="mr-1 fas fa-chart-line"></i> {{round(($epargne_mensuel / $objectif_mensuel) * 100)}}%</span>
                  <span class="ml-2 text-gray-500">de l'objectif</span>
              </div>
          </div>
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne pour Objectif Annuel</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                      <i class="text-purple-600 fas fa-bullseye"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">{{ number_format($epargne_objectif_annuel, 2) }} DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-purple-600"><i class="mr-1 fas fa-percentage"></i> {{round(($epargne_objectif_annuel / $userSalaire) * 100)}}%</span>
                  <span class="ml-2 text-gray-500">du salaire</span>
              </div>
          </div>
      </div>
      {{-- -------------------------------------- Objectifs Epargne --------------------------------------- --}}
     <div class="flex justify-between w-full mb-6">
        <h3 class="text-2xl font-bold text-gray-800 lg:text-2xl">Objectif Epargne</h3>     
     </div>
     <div class="grid grid-cols-1 gap-4 mb-12 md:grid-cols-2">
        {{-- -------------------------------------- Objectif Mensuel ----------------------------------------- --}}
         <div class="relative p-5 bg-white rounded hover:shadow ">
             <div class="flex justify-between align-center">
                 <h3 class="mb-1 text-xl font-medium text-gray-600 ">Objectif Mensuel</h3>
                 <button onclick="openObjectifModal()" class="absolute text-gray-600 top-4 right-4 hover:text-blue-600">
                     <i class="fas fa-edit"></i>
                 </button>
             </div>      
             <div class="flex items-center justify-between mt-2">
                 <div>
                     <div class="mt-3">
                         <p class="mb-1 text-sm text-gray-500">Montant à atteindre</p>
                         <p class="text-lg font-medium text-gray-700">{{ number_format($objectif_mensuel, 0, '.', ' ') }} DH</p>
                     </div>
                 </div>                 
                 <div class="relative w-20 h-20">
                     @php
                         $percentMensuel = $objectif_mensuel > 0 ? min(100, ($epargne_mensuel / $objectif_mensuel) * 100) : 0;
                     @endphp                   
                     <svg class="w-full h-full" viewBox="0 0 100 100">
                         <circle 
                             cx="50" cy="50" r="45" 
                             fill="none" 
                             stroke="#e0e7ff" 
                             stroke-width="6"
                             stroke-dasharray="5,5"
                         />                         
                         <circle 
                             cx="50" cy="50" r="45" 
                             fill="none" 
                             stroke="#367588" 
                             stroke-width="6"
                             stroke-linecap="round"
                             stroke-dasharray="283"
                             stroke-dashoffset="{{ 283 - (283 * ($percentMensuel / 100)) }}"
                             transform="rotate(-90 50 50)"
                         />
                         <text x="50" y="55" text-anchor="middle" font-size="18" font-weight="bold" fill="#367588">
                             {{ round($percentMensuel) }}%
                         </text>
                     </svg>
                 </div>
             </div>
         </div>
         {{-- -------------------------------------- Objectif Annuel ----------------------------------------- --}}
         <div class="relative p-5 bg-white rounded hover:shadow">
             <div class="flex justify-between align-center">
                 <h3 class="mb-1 text-xl font-medium text-gray-600">Objectif Annuel</h3>
                 <button onclick="openObjectifAnnuelModal()" class="absolute text-gray-600 top-4 right-4 hover:text-blue-600">
                     <i class="fas fa-edit"></i>
                 </button>
             </div>         
             <div class="flex items-center justify-between mt-2">
                     <div class="mt-3">
                         <p class="mb-1 text-sm text-gray-500">Montant à atteindre</p>
                         <p class="text-lg font-medium text-gray-700">{{ number_format($objectif_annuel, 0, '.', ' ') }} DH</p>
                     </div> 
                 <div class="relative w-20 h-20">
                     @php
                         $percentAnnuel = $objectif_annuel > 0 ? min(100, ($epargne_annuel / $objectif_annuel) * 100) : 0;
                     @endphp                   
                     <svg class="w-full h-full" viewBox="0 0 100 100">
                         <circle 
                             cx="50" cy="50" r="45" 
                             fill="none" 
                             stroke="#e0e7ff" 
                             stroke-width="6"
                             stroke-dasharray="5,5"
                         />
                         <circle 
                             cx="50" cy="50" r="45" 
                             fill="none" 
                             stroke="#0C2340" 
                             stroke-width="6"
                             stroke-linecap="round"
                             stroke-dasharray="283"
                             stroke-dashoffset="{{ 283 - (283 * ($percentAnnuel / 100)) }}"
                             transform="rotate(-90 50 50)"
                         />                         
                         <text x="50" y="55" text-anchor="middle" font-size="18" font-weight="bold" fill="#0C2340">
                             {{ round($percentAnnuel) }}%
                         </text>
                     </svg>
                 </div>
             </div>
         </div>
     </div>
    {{-- -------------------------------------- Liste Souhaites ----------------------------------------- --}}
     <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">   
        <div>
            <h3 class="text-2xl font-bold text-gray-800 lg:text-2xl">Liste de souhaits</h3>
        </div>
        <button onclick="openSouhaiteModal()" class="flex items-center justify-center px-4 py-2 text-sm text-white bg-gray-800 rounded sm:w-auto hover:bg-gray-900">
         <i class="mr-2 fas fa-plus"></i> Ajouter un souhait
       </button>
     </div>
     {{-- ------------------------------------ Tableau des Souhaites ------------------------------------ --}}
     <div class="relative w-full mb-8">
        <div class="w-full p-4 bg-white rounded shadow-sm">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Souhait</th>
                                <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant nécessaire</th>
                                <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant épargné</th>
                                <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Progression (%)</th>
                                <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($listeSouhaites as $souhaite)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-3 text-sm text-gray-700 md:text-base">{{$souhaite->description}}</td>
                                <td class="px-4 py-3 text-sm text-gray-700 md:text-base">{{$souhaite->montant_necessaire}} DH</td>
                                <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">{{$souhaite->montant_epargne}} DH</td>
                                <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">{{number_format(($souhaite->montant_epargne/$souhaite->montant_necessaire) * 100, 2)}}%</td>
                                <td class="px-4 py-3 text-center">
                                    <button onclick="openEpargneModal({{$souhaite->id}})" class="px-3 py-1 text-xs text-white rounded sm:px-2 sm:py-1 bg-blue-600/70 hover:bg-blue-700/80">
                                        Ajouter épargne
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
      {{-- ---------------------------------------------------------------------------------------------------------- --}}
        <div class="flex flex-col items-center justify-between px-3 py-3 mt-2 bg-white border-t sm:flex-row sm:px-4">
            <div class="flex justify-between flex-1 sm:hidden">
                @if ($listeSouhaites->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 rounded cursor-default sm:text-sm">
                        Précédent
                    </span>
                @else
                    <a href="{{ $listeSouhaites->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
                        Précédent
                    </a>
                @endif
                
                @if ($listeSouhaites->hasMorePages())
                    <a href="{{ $listeSouhaites->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
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
                        Affichage de <span class="font-medium">{{ $listeSouhaites->firstItem() ?? 0 }}</span> à <span class="font-medium">{{ $listeSouhaites->lastItem() ?? 0 }}</span> sur <span class="font-medium">{{ $listeSouhaites->total() }}</span> résultats
                    </p>
                </div>              
                <div class="mt-3 sm:mt-0">
                    <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                        @if ($listeSouhaites->onFirstPage())
                            <span class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 cursor-default sm:text-sm rounded-l-md">
                                <span class="sr-only">Précédent</span>
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $listeSouhaites->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-l-md hover:bg-gray-50">
                                <span class="sr-only">Précédent</span>
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif
                        
                        @for ($i = 1; $i <= $listeSouhaites->lastPage(); $i++)
                            @if ($i == $listeSouhaites->currentPage())
                                <span aria-current="page" class="relative z-10 inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-gray-900 border border-gray-900 sm:px-4 sm:text-sm">
                                    {{ $i }}
                                </span>
                            @else
                                <a href="{{ $listeSouhaites->url($i) }}" class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:px-4 sm:text-sm hover:bg-gray-50">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor
                        
                        @if ($listeSouhaites->hasMorePages())
                            <a href="{{ $listeSouhaites->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-r-md hover:bg-gray-50">
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
  @include('dashboard.user.modals.objectifMensuelModal')
  @include('dashboard.user.modals.objectifAnnuelModal')
  @include('dashboard.user.modals.addEpargneModal')
  @include('dashboard.user.modals.addSouhaiteModal')
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

    @if (session('error'))
    <div id="toast-error" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-yellow-500 rounded shadow-lg bottom-4 right-4 animate-slide-up z-50">
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
    const editObjectifModal = document.getElementById("editObjectifModal");
    const addSouhaiteModal = document.getElementById("addSouhaiteModal");
    function openObjectifModal()
    {
        editObjectifModal.classList.remove('hidden');
        editObjectifModal.classList.add('flex');
    }
    function closeObjectifModal()
    {
        editObjectifModal.classList.remove('flex');
        editObjectifModal.classList.add('hidden');
    }
    function cancelObjectifModal()
    {
        editObjectifModal.classList.remove('flex');
        editObjectifModal.classList.add('hidden');
    }
    // -----------------------------------------------
    function openSouhaiteModal()
    {
       addSouhaiteModal.classList.remove('hidden');
       addSouhaiteModal.classList.add('flex');
    }
    function closeSouhaiteModal()
    {
       addSouhaiteModal.classList.remove('flex');
       addSouhaiteModal.classList.add('hidden');
    }
    function cancelSouhaiteModal()
    {
       addSouhaiteModal.classList.remove('flex');
       addSouhaiteModal.classList.add('hidden');
    }
    // ----------------------------------------------
    function openEpargneModal(id)
    {
       const addEpargneModal = document.getElementById(`addEpargneModal${id}`);
       addEpargneModal.classList.remove('hidden');
       addEpargneModal.classList.add('flex');
    }
    function closeEpargneModal(id)
    {
       const addEpargneModal = document.getElementById(`addEpargneModal${id}`);
       addEpargneModal.classList.remove('flex');
       addEpargneModal.classList.add('hidden');
    }
    function cancelEpargneModal(id)
    {
       const addEpargneModal = document.getElementById(`addEpargneModal${id}`);
       addEpargneModal.classList.remove('flex');
       addEpargneModal.classList.add('hidden');
    }
    // -------------------------------------------
    function openObjectifAnnuelModal()
    {
        const editObjectifAnnuelModal = document.getElementById("editObjectifAnnuelModal");
        editObjectifAnnuelModal.classList.remove('hidden');
        editObjectifAnnuelModal.classList.add('flex');
    }
    function closeObjectifAnnuelModal()
    {
        const editObjectifAnnuelModal = document.getElementById("editObjectifAnnuelModal");
        editObjectifAnnuelModal.classList.remove('flex');
        editObjectifAnnuelModal.classList.add('hidden');
    }
    function cancelObjectifAnnuelModal()
    {
        const editObjectifAnnuelModal = document.getElementById("editObjectifAnnuelModal");
        editObjectifAnnuelModal.classList.remove('flex');
        editObjectifAnnuelModal.classList.add('hidden');
    }
    // -------------------------------------------
    function closeToast(id) {
        document.getElementById(id).style.display = 'none';
    }
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
    }, 5000);
</script>
@endsection