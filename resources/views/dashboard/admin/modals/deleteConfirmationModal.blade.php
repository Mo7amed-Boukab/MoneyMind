@foreach($categories as $categorie)
<div id="delete{{$categorie->id}}" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
        <div class="relative z-50 w-full max-w-md p-6 mx-auto bg-white rounded-lg shadow-xl">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900">Confirmer la suppression</h3>
                <button onclick="closeConfirmationModal({{$categorie->id}})" class="absolute text-gray-400 top-4 right-4 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mb-4">
                <p class="text-sm text-gray-500">
                    Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.
                </p>
            </div>
            <div class="flex justify-end space-x-3">
                <button onclick="closeConfirmationModal({{$categorie->id}})"
                        class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                    Annuler
                </button>
                <form action="{{ route('admin.categorie.supprimer', $categorie->id) }}" method="POST">
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