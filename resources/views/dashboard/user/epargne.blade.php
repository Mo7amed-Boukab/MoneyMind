@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="p-6 mx-auto lg:p-8 max-w-7xl">
         <div class="flex items-center justify-between mb-8 md:flex-row">
             <div class="mt-4 md:mt-0">
               <h2 class="text-3xl font-bold text-gray-800">Gestion de l'Épargne</h2>
             </div>
         </div>

      <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2 md:gap-6 md:mb-8">
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Épargne totale</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-green-100 rounded-full md:w-10 md:h-10">
                <i class="text-green-600 icon icon-dollar-sign"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{$epargne->epargne_total}} DH</p>
          </div>
                    
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Épargne mensuel</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full md:w-10 md:h-10">
                <i class="text-blue-600 icon icon-calendar"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{$epargne->epargne_mensuel}} DH</p>
          </div>       
     </div>
        
     <!-- Objectif d'Épargne -->
     <div class="p-4 mb-6 bg-white rounded shadow-sm md:p-6 md:mb-8">
         <div class="flex items-center justify-between mb-4 md:mb-6">
             <h3 class="text-lg font-bold text-gray-800 md:text-xl">Objectif d'Épargne</h3>
         </div>
         <div class="flex flex-col items-center gap-2 mb-4 sm:flex-row sm:gap-4">
             <input type="text" id="savingsGoalAmount" value="{{$epargne->objectif_mensuel}}" class="w-full px-3 py-2 text-gray-700 border rounded" disabled>
           <button onclick="openObjectifModal()" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white transition rounded sm:w-auto bg-blue-600/70 hover:bg-blue-600/80 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            Modifier
          </button>  
         </div> 
     </div>
                
    <!-- Liste de souhaits -->
    <div class="p-4 mb-6 bg-white rounded shadow-sm md:p-6 md:mb-8">
     <div class="flex flex-col items-start justify-between gap-3 mb-4 sm:flex-row sm:items-center sm:mb-6">
       <h3 class="text-lg font-bold text-gray-800 md:text-xl">Liste de souhaits</h3>
       <button onclick="openSouhaiteModal()" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-gray-800 rounded sm:w-auto hover:bg-gray-900">
         <i class="mr-2 fas fa-plus"></i> Ajouter un souhait
       </button>
     </div>
     <div class="overflow-x-auto">
       <table class="w-full border-collapse">
         <thead>
           <tr class="border-b bg-gray-50">
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Souhait</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant nécessaire</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant épargné</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Progression (%)</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
           </tr>
         </thead>
         <tbody>
          @foreach($listeSouhaites as $souhaite)
           <tr class="border-b hover:bg-gray-100">
             <td class="px-4 py-3 text-sm text-gray-700 md:text-base">{{$souhaite->description}}</td>
             <td class="px-4 py-3 text-sm text-gray-700 md:text-base">{{$souhaite->montant_necessaire}} DH</td>
             <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">{{$souhaite->montant_epargne}} DH</td>
             <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">{{number_format(($souhaite->montant_epargne/$souhaite->montant_necessaire) * 100, 2)}}%</td>
             <td class="px-4 py-3 text-center">
               <button onclick="openEpargneModal({{$souhaite->id}})" class="px-2 py-1 text-xs text-white rounded sm:px-3 sm:py-2 bg-blue-600/70 hover:bg-blue-700/80">
                 Ajouter épargne
               </button>
             </td>
           </tr>
        
           @endforeach
         </tbody>
       </table>
     </div>

       <!-- Pagination -->
       <div class="flex flex-col items-center justify-between px-3 py-3 mt-2 bg-white border-t sm:flex-row sm:px-4 sm:px-6">
        <div class="flex justify-between flex-1 sm:hidden">
          <a href="#" class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
            Précédent
          </a>
          <a href="#" class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded sm:text-sm hover:bg-gray-50">
            Suivant
          </a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
          <div>
            <p class="text-xs text-gray-700 sm:text-sm">
              Affichage de <span class="font-medium">1</span> à <span class="font-medium">4</span> sur <span class="font-medium">12</span> résultats
            </p>
          </div>
          <div class="mt-3 sm:mt-0">
            <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
              <a href="#" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-l-md hover:bg-gray-50">
                <span class="sr-only">Précédent</span>
                <i class="fas fa-chevron-left"></i>
              </a>
              <a href="#" aria-current="page" class="relative z-10 inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-gray-900 sm:px-4 sm:text-sm">
                1
              </a>
              <a href="#" class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:px-4 sm:text-sm hover:bg-gray-50">
                2
              </a>
              <a href="#" class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:px-4 sm:text-sm hover:bg-gray-50">
                3
              </a>
              <a href="#" class="relative inline-flex items-center px-2 py-2 text-xs font-medium text-gray-500 bg-white border border-gray-300 sm:text-sm rounded-r-md hover:bg-gray-50">
                <span class="sr-only">Suivant</span>
                <i class="fas fa-chevron-right"></i>
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
  @include('dashboard.user.modals.objetifModal')
  @include('dashboard.user.modals.addEpargneModal')
  @include('dashboard.user.modals.addSouhaiteModal')
@endsection

@section('toast')

    @if (session('add'))
    <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
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
    function closeToast(id) {
        document.getElementById(id).style.display = 'none';
    }
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
    }, 5000);

</script>
@endsection