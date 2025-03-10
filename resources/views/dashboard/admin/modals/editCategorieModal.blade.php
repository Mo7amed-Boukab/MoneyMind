@foreach($categories as $categorie)
<div id="editCategorieModal{{$categorie->id}}" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
        <div class="relative z-50 w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900">Modifier la catégorie</h3>
                <button onclick="closeEditModal({{$categorie->id}})" class="absolute text-gray-400 top-4 right-4 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.categorie.modifier', $categorie->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_name{{$categorie->id}}" class="block mb-2 text-sm font-medium text-gray-700">Nom de la catégorie</label>
                    <input type="text" name="name" id="edit_name{{$categorie->id}}" value="{{$categorie->name}}" required
                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeEditModal({{$categorie->id}})"
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
