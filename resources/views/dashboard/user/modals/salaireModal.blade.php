<div id="salaireModal" class="fixed inset-0 z-50 items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
 <div class="w-full max-w-md p-6 mx-4 bg-white rounded shadow-xl">
     <div class="flex items-center justify-between mb-4">
         <h3 class="text-xl font-bold text-gray-800">Modifier le salaire</h3>
         <button onclick="closeSalaireModal()" class="text-gray-400 hover:text-gray-600">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                 <line x1="18" y1="6" x2="6" y2="18"></line>
                 <line x1="6" y1="6" x2="18" y2="18"></line>
             </svg>
         </button>
     </div>

     <form action="{{ route('user.salaire') }}" method="POST">
         @csrf
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="nouveauSalaire">
                 Montant du salaire (DH)
             </label>
             <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none" id="nouveauSalaire" name="salaire" type="number" value="{{ Auth::user()->salaire }}" required>
         </div>

         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="nouveauJourSalaire">
                 jour de crédit (1-31)
             </label>
             <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none" id="nouveauJourSalaire" name="date_salaire" type="number" value="{{ Auth::user()->date_salaire}}" min="1" max="31" required>
         </div>

         <div class="flex justify-end">
             <button type="button" onclick="cancelSalaireModal()" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                 Annuler
             </button>
             <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
                 Enregistrer
             </button>
         </div>
     </form>
 </div>
</div>
