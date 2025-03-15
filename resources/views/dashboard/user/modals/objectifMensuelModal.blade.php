<div id="editObjectifModal" class="fixed inset-0 z-50 items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
 <div class="w-full max-w-md p-6 mx-4 bg-white rounded shadow-xl">
     <div class="flex items-center justify-between mb-4">
         <h3 class="text-xl font-medium text-gray-900">Objectif Mensuel</h3>
         <button onclick="closeObjectifModal()" class="text-gray-400 hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
         </button>
     </div>
     
     <form id="editSavingsGoalForm" action="{{route('epargne.objectif-mensuel')}}" method="POST">
      @csrf
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="newSavingsGoalAmount">
                Objectif mensuel à atteindre (DH)
             </label>
             <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none" id="newSavingsGoalAmount" name="objectif_mensuel" value="{{$objectif_mensuel}}" type="number" required>
         </div>
         
         <div class="flex justify-end">
             <button type="button" onclick="cancelObjectifModal()" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                 Annuler
             </button>
             <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
                 Enregistrer
             </button>
         </div>
     </form>
 </div>
</div>
