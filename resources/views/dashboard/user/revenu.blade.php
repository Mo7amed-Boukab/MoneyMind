@extends('layouts.master')

@section('main')
   
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
         <div class="flex flex-col items-start justify-between mb-8 md:flex-row md:items-center">
             <div>
                 <h2 class="text-3xl font-bold text-gray-800">Gestion des Revenus</h2>
                 <p class="text-gray-600">Suivez et gérez votre salaire mensuel</p>
             </div>
         </div>

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

         <div class="flex items-center justify-between mb-6">
           <h3 class="text-3xl font-bold text-gray-800 sm:text-2xl">Historique des versements</h3>
           <button onclick="openSalaireModal()" class="flex items-center px-4 py-2 ml-4 text-sm font-medium text-white transition bg-gray-800 rounded hover:bg-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
              Configurer
          </button>
      </div>
         <div class="relative w-full mb-8">
             <div class="w-full p-4 bg-white rounded-lg shadow-sm">
                 <div class="overflow-x-auto">
                     <div class="inline-block min-w-full align-middle">
                         <table class="min-w-full divide-y divide-gray-200">
                             <thead>
                                 <tr>
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