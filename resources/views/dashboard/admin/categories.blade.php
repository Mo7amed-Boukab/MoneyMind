@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <!-- Header -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Catégories</h2>
            <p class="text-gray-600">Gérez les catégories de dépenses et leurs paramètres</p>
        </div>

        <div class="flex flex-col mb-6 sm:flex-row sm:items-center sm:justify-between">
          <h3 class="text-xl font-bold text-gray-800 lg:text-2xl">Liste des Catégories</h3>
          <button onclick="openAddModal()" class="flex items-center px-4 py-2 mt-3 text-white transition rounded bg-blue-500/90 sm:mt-0 hover:bg-blue-500 focus:outline-none">
              <i class="mr-2 fas fa-plus"></i>Ajouter une catégorie
          </button>
        </div>
        
        <div class="bg-white rounded shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Nombre d'utilisations</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">% Dépenses</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center w-10 h-10 mr-3 text-green-600 bg-green-100 rounded-full">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <h4 class="text-sm font-medium md:text-base">{{ $categorie->name }}</h4>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                               {{ $categorie->depenses_count ?? 0 }} utilisations
                           </td>
                           
                            <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                               {{ $categorie->pourcentage }}
                            </td>
                          
                            <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                                <div class="flex justify-center space-x-2">
                                    <button onclick="openEditModal({{$categorie->id}})" 
                                            class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                        Modifier
                                    </button>
                                        <button type="submit" onclick="openConfirmationModal({{$categorie->id}})"
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

 @section('modal')
  @include('dashboard.admin.modals.addCategorieModal')
  @include('dashboard.admin.modals.editCategorieModal')
  @include('dashboard.admin.modals.deleteConfirmationModal')
@endsection

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
    function openAddModal() {
        document.getElementById('addCategorieModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addCategorieModal').classList.add('hidden');
    }
   // -----------------------------------------------------------------
    function openEditModal(id) {
       document.getElementById(`editCategorieModal${id}`).classList.remove('hidden');
    }
    
    function closeEditModal(id) {
        document.getElementById(`editCategorieModal${id}`).classList.add('hidden');
    }
 
    // ----------------------------------------------------------------
    function openConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.remove('hidden');
    }
    
    function closeConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.add('hidden');
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