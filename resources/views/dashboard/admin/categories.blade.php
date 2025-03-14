@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <!-- Header -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Catégories</h2>
            <p class="text-gray-600">Gérez les catégories de dépenses et leurs paramètres</p>
        </div>

        <div class="flex flex-col mb-6 sm:flex-row sm:items-center sm:justify-between">
          <h3 class="text-xl font-bold text-gray-800 lg:text-2xl">Liste des Catégories</h3>
          <button onclick="openAddModal()" class="flex items-center px-4 py-2 mt-3 text-white transition rounded bg-blue-500/90 sm:mt-0 hover:bg-blue-500 focus:outline-none">
              <i class="mr-2 fas fa-plus"></i>Ajouter une catégorie
          </button>
        </div>
        
        <div class="bg-white rounded shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Nombre d'utilisations</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">% Dépenses</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center w-10 h-10 mr-3 text-green-600 bg-green-100 rounded-full">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <h4 class="text-sm font-medium md:text-base">Facture</h4>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                               2 utilisations
                           </td>
                           
                            <td class="px-4 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                               10%
                            </td>
                          
                            <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                                <div class="flex justify-center space-x-2">
                                    <button class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                        Modifier
                                    </button>
                                    <button class="px-3 py-1 text-white bg-gray-500 rounded hover:bg-gray-600">
                                        Supprimer
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

 @endsection