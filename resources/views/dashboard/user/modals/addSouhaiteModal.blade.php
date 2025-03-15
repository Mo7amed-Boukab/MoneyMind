<div id="addSouhaiteModal" class="fixed inset-0 z-50 items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
 <div class="w-full max-w-md p-6 mx-4 bg-white rounded shadow-xl">
     <div class="flex items-center justify-between mb-4">
         <h3 class="text-xl font-medium text-gray-900">Ajouter un souhait</h3>
         <button onclick="closeSouhaiteModal()" class="text-gray-400 hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
         </button>
     </div>
     
     <form action="{{ route('liste-souhaites.store') }}" method="POST">
      @csrf
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="souhaite">
                 Nom du souhait
             </label>
             <input type="text" name="description" id="souhaite"  placeholder="Nom du souhait" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" required>
         </div>
         
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="montant">
                 Montant nécessaire (DH)
             </label>
             <input type="number" name="montant_necessaire" id="montant" placeholder="Ex: 1000" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" required>
         </div>
         
         <div class="flex justify-end">
             <button type="button" onclick="cancelSouhaiteModal()" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded">
                 Annuler
             </button>
             <button type="submit" class="px-6 py-2 text-white bg-gray-800 rounded hover:bg-gray-900 ">
                 Ajouter
             </button>
         </div>
     </form>
 </div>
</div>