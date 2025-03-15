@foreach($depenses as $depense)
<div id="editDepense{{$depense->id}}" class="fixed inset-0 z-50 flex items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
 <div class="w-full max-w-xl p-6 mx-4 bg-white rounded shadow-xl">
     <div class="flex items-center justify-between mb-4">
         <h3 class="text-xl font-bold text-gray-800">Modifier la Dépense</h3>
         <button onclick="closeEditDepenseModal({{$depense->id}})" class="text-gray-400 hover:text-gray-600">
             <i class="text-xl fas fa-times"></i>
         </button>
     </div>
     <form  action="{{ route('depense.modifier',$depense) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="edit_description">Description</label>
             <input  type="text" name="description" value="{{ $depense->description }}" id="edit_description" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" required>
         </div>
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="edit_montant">Montant (DH)</label>
             <input  type="number" name="montant" value="{{ $depense->montant_depense }}" id="edit_montant" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" required>
         </div>
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="edit_categorie">Catégorie</label>
             <select name="categorie" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" id="edit_categorie" required>
                   <option value="" disabled selected>Sélectionnez une catégorie</option>
               @foreach($categories as $categorie)
               <option value="{{ $categorie->id }}" {{ $depense->categorie_id == $categorie->id ? 'selected' : '' }}>
                   {{ $categorie->name }}
               </option>
               @endforeach
             </select>
         </div>
         <div class="mb-4">
             <label class="block mb-2 text-sm font-medium text-gray-700" for="edit_date">Date de Paiement</label>
             <input type="date" name="date_paiement" value="{{ $depense->date_paiement }}" id="edit_date" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded" required>
         </div>
         <div class="flex justify-end">
             <button type="button" onclick="cancelEditDepenseModal({{$depense->id}})" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Annuler</button>
             <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">Enregistrer</button>
         </div>
     </form>
 </div>
</div>
@endforeach