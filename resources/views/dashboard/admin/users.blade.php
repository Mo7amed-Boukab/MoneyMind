@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
       
          <div class="mb-20">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Utilisateurs</h2>
            <p class="text-gray-600">Gérez vos utilisateurs et suivez leurs activités sur la plateforme</p>
          </div>

        <div class="flex flex-col mb-4 sm:flex-row sm:items-center sm:justify-between">
         <h3 class="text-xl font-bold text-gray-800 lg:text-2xl">Liste des Utilisateurs</h3>
       </div>
    <div class="mb-8 bg-white rounded shadow-sm">   
     <div class="overflow-x-auto">
       <table class="min-w-full">
         <thead>
           <tr class="border-b bg-gray-50">
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Utilisateur</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Dernière activité</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Salaire</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Statut</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
           </tr>
         </thead>
         <tbody>
           @foreach($users as $user)
           <tr class="border-b hover:bg-gray-50">
             <td class="px-4 py-3 whitespace-nowrap">
               <div class="flex items-center">
                 <div class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                   <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                 </div>
                 <div class="ml-3">
                   <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                 </div>
               </div>
             </td>
             <td class="px-4 py-3 whitespace-nowrap">
               <div class="text-sm text-gray-500">{{ $user->email }}</div>
             </td>
             <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
               @if($user->logged_at)
                 @php
                   $lastLogin = \Carbon\Carbon::parse($user->logged_at);
                   $now = \Carbon\Carbon::now();
                   $diff = $lastLogin->diffForHumans(['parts' => 2]);
                 @endphp
                 {{ $diff }}
               @else
                 Jamais connecté
               @endif
             </td>
             <td class="px-4 py-3 text-sm font-medium text-right text-gray-900 whitespace-nowrap">
               {{ number_format($user->salaire, 0, ',', ' ') }} DH
             </td>
             <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
               <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full
                 {{ $user->status == 'active' ? 'text-green-800 bg-green-100' : 'text-red-800 bg-red-100' }}">
                 {{ ucfirst($user->status) }}
               </span>
             </td>
             <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
               <button onclick="openConfirmationModal({{$user->id}})" 
                       class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">
                   Supprimer
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
 </div>

@section('toast')
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

@section('modal')
    @foreach($users as $user)
    <div id="delete{{$user->id}}" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <div class="relative z-50 w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Confirmer la suppression</h3>
                    <button onclick="closeConfirmationModal({{$user->id}})" class="absolute text-gray-400 top-4 right-4 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-gray-500">
                        Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.
                    </p>
                </div>
                <div class="flex justify-end space-x-3">
                    <button onclick="closeConfirmationModal({{$user->id}})"
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Annuler
                    </button>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')
<script>
    function openConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.remove('hidden');
    }
    
    function closeConfirmationModal(id) {
        document.getElementById(`delete${id}`).classList.add('hidden');
    }

    function closeToast(id) {
        document.getElementById(id).style.display = 'none';
    }
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
    }, 5000);
</script>
@endsection
@endsection