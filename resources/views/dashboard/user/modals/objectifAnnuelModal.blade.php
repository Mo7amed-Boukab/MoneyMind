<!-- Modal pour Objectif Annuel -->
<div id="editObjectifAnnuelModal" class="fixed inset-0 z-50 flex items-center justify-center hidden overflow-auto bg-black bg-opacity-50">
    <div class="relative w-full max-w-md p-6 mx-auto bg-white rounded shadow-lg">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-medium text-gray-900">Objectif annuel</h3>
            <button type="button" onclick="closeObjectifAnnuelModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded p-1.5 ml-auto inline-flex items-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form -->
        <form action="{{ route('epargne.objectif-annuel') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="objectif_annuel" class="block mb-2 text-sm font-medium text-gray-700">Objectif annuel à atteindre (DH)</label>
                <input type="number" id="objectif_annuel" name="objectif_annuel" value="{{ $objectif_annuel }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none" required>
            </div>
            
            <div class="mb-6">
                <label for="epargne_objectif" class="block mb-2 text-sm font-medium text-gray-700">Montant à épargner chaque mois (DH)</label>
                <input type="number" id="epargne_objectif" name="epargne_objectif_annuel" value="{{  $epargne_objectif_annuel }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none" required>
                <p class="mt-1 text-xs text-gray-500">Ce montant sera dédié à votre salaire mensuellement</p>
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="cancelObjectifAnnuelModal()" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                    Annuler
                </button>
                <button type="submit" class="px-4 py-2 text-white bg-gray-800 rounded hover:bg-gray-900">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div> 