<div id="addCategorieModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
 <div class="flex items-center justify-center min-h-screen px-4">
     <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
     <div class="relative z-50 w-full max-w-md p-6 mx-auto bg-white rounded shadow-xl">
         <div class="mb-4">
             <h3 class="text-lg font-medium text-gray-900">Ajouter une catégorie</h3>
             <button onclick="closeAddModal()" class="absolute text-gray-400 top-4 right-4 hover:text-gray-500">
                 <i class="fas fa-times"></i>
             </button>
         </div>
         <form action="{{ route('admin.categorie.ajouter') }}" method="POST">
             @csrf
             <div class="mb-4">
                 <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom de la catégorie</label>
                 <input type="text" name="name" id="name" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
             </div>
             <div class="flex justify-end mt-6 space-x-3">
                 <button type="button" onclick="closeAddModal()"
                         class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                     Annuler
                 </button>
                 <button type="submit"
                         class="px-4 py-2 text-sm text-white bg-gray-600 rounded hover:bg-gray-700">
                     Ajouter
                 </button>
             </div>
         </form>
     </div>
 </div>
</div>
