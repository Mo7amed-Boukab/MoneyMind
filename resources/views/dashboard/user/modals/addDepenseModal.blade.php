<div id="addDepenseModal" class="fixed inset-0 z-50 items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
 <div class="w-full max-w-xl p-6 mx-4 bg-white rounded shadow-xl">
   <div class="flex items-center justify-between mb-4">
     <h3 class="text-xl font-bold text-gray-800">Ajouter une nouvelle dépense</h3>
     <button onclick="closeDepenseModal()" class="text-gray-400 hover:text-gray-600">
       <i class="text-xl fas fa-times"></i>
     </button>
   </div>
 
    <form action="{{ route('depense.ajouter') }}" method="POST">
       @csrf
        <div class="mb-4">
           <label class="block mb-2 text-sm font-medium text-gray-700" for="description">Description</label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded " id="description" name="description" type="text" placeholder="Ex: Abonnement Netflix" required>
        </div>
       
        <div class="mb-4">
          <label class="block mb-2 text-sm font-medium text-gray-700" for="montant">Montant (DH)</label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" id="montant" name="montant" type="number" placeholder="Ex: 100" required>
        </div>
      
        <div class="mb-4">
           <label class="block mb-2 text-sm font-medium text-gray-700" for="categorie">Catégorie</label>
           <select class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" id="categorie" name="categorie" required>
               <option value="" disabled selected>Sélectionnez une catégorie</option>
               @foreach($categories as $categorie)
               <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
               @endforeach
           </select>
        </div>
      
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-700" for="type">Type de dépense</label>
            <select class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" id="type" name="type" required>
                <option value="" disabled selected>Sélectionnez le type</option>
                <option value="non_recurrente">Dépense non récurrente</option>
                <option value="recurrente">Dépense récurrente</option>
            </select>
        </div>
      
       <div class="mb-4">
           <label class="block mb-2 text-sm font-medium text-gray-700" for="date">Date</label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" id="date" name="date_paiement" type="date" required>
       </div>
       
       <div class="flex justify-end">
           <button type="button" onclick="cancelDepenseModal()" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Annuler</button>
           <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded hover:bg-gray-800">Enregistrer</button>
       </div>
   </form>
</div>
</div>

