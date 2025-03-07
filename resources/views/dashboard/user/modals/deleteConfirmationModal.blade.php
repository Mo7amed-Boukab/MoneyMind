@foreach($depenses as $depense)
<div id="delete{{$depense->id}}" class="fixed inset-0 z-50 items-center justify-center hidden w-full min-h-screen overflow-y-auto bg-gray-600 bg-opacity-50 modal">
 <div class="relative w-full max-w-md bg-white border rounded shadow-xl">
     <button onclick="closeConfirmationModal({{$depense->id}})" class="absolute text-gray-500 hover:text-gray-700 top-4 right-4 focus:outline-none">
         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
         </svg>
     </button>

     <div class="p-6">
         <h3 class="mb-4 text-xl font-semibold text-gray-900">Confirmer la suppression</h3>
         <p class="mb-6 text-gray-600">Êtes-vous sûr de vouloir supprimer la dépense du "{{ $depense->description }}" ?</p>

         <div class="flex justify-end gap-4">
             <button type="button" onclick="cancelConfirmationModal({{$depense->id}})" class="px-4 py-2 text-gray-700 bg-gray-100 rounded closeDeleteModal">
                 Annuler
             </button>
             <form action="{{ route('depense.supprimer', $depense) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                 <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                     Confirmer
                 </button>
             </form>
         </div>
     </div>
 </div>
</div>
@endforeach