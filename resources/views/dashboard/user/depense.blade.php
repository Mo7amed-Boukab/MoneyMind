@extends('layouts.master')

@section('main')
   
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="max-w-full p-4 mx-auto lg:p-8">
         <div class="flex flex-col items-start justify-between mb-8 md:flex-row md:items-center">
             <div>
              <h2 class="text-3xl font-bold text-gray-800">Gestion des Dépenses</h2>
              <p class="text-sm text-gray-600 sm:text-base">Suivez et gérez toutes vos dépenses en un seul endroit</p>
            </div>
        </div>
        
      <div class="grid grid-cols-1 gap-4 mb-12 lg:grid-cols-3">
         <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses totales</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-red-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-red-600 fas fa-shopping-cart"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">700 DH</p>
            <div class="flex items-center mt-2 text-xs text-red-600 sm:text-sm">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>7% du salaire dépensé</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses récurrentes</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-blue-600 fas fa-sync-alt"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">200 DH</p>
            <div class="flex items-center mt-2 text-xs text-blue-600 sm:text-sm">
              <i class="mr-1 fas fa-info-circle"></i>
              <span>2% du salaire</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
           <div class="flex items-center justify-between mb-4">
              <h3 class="text-sm font-medium text-gray-500 sm:text-base">Dépenses non recurrente</h3>
              <div class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-full sm:w-10 sm:h-10">
                <i class="text-purple-600 fas fa-receipt"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 sm:text-3xl">500 DH</p>
            <div class="flex items-center mt-2 text-xs text-purple-600 sm:text-sm">
              <i class="mr-1 fas fa-info-circle"></i>
              <span>5% du salaire</span>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-between mb-4">   
          <div>
             <h3 class="text-3xl font-bold text-gray-800 sm:text-2xl">Dépenses Récurrente</h3>
         </div>
          <button onclick="openModalAddDepense()" class="flex items-center justify-center px-3 py-2 mt-2 text-sm text-white bg-red-600 rounded sm:px-4 sm:text-base transiton hover:bg-red-700 focus:outline-none sm:mt-0 sm:w-auto sm:justify-start">
            <i class="mr-2 fas fa-plus"></i>Ajouter une dépense
          </button>
        </div>

        <!-- Dépenses Récurrente -->
        <div class="relative w-full mb-8">
            <div class="w-full p-4 bg-white rounded-lg shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Montant</th>
                                    <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="border-b hover:bg-gray-50">
                                 <td class="px-4 py-3 sm:px-4 whitespace-nowrap">
                                   <div class="flex items-center">
                                     <div>
                                       <div class="text-xs font-medium text-gray-900 sm:text-sm">depense 1</div>
                                     </div>
                                   </div>
                                 </td>
                                 <td class="px-4 py-3 sm:px-4 whitespace-nowrap">
                                   <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">
                                     Facture
                                   </span>
                                 </td>
                                 <td class="px-4 py-3 text-xs text-gray-500 sm:px-4 sm:text-sm whitespace-nowrap">
                                  10/02/2025
                                 </td>
                                 <td class="px-4 py-3 text-xs font-medium text-right text-gray-900 sm:px-4 sm:text-sm whitespace-nowrap">
                                 200 DH
                                 </td>
                                 <td class="px-4 py-3 text-xs text-center sm:px-4 sm:text-sm whitespace-nowrap">
                                      <button  class="p-1 text-blue-600 hover:text-blue-800">
                                          <i class="fas fa-edit"></i>
                                      </button>
                                      <button  class="p-1 text-red-600 hover:text-red-800">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                 </td>
                                </tr>
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  @endsection
