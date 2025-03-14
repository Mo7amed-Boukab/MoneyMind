@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
       
          <div class="mb-20">
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Gestion des Utilisateurs</h2>
            <p class="text-gray-600">Gérez vos utilisateurs et suivez leurs activités sur la plateforme</p>
          </div>

        <div class="flex flex-col mb-4 sm:flex-row sm:items-center sm:justify-between">
         <h3 class="text-xl font-bold text-gray-800 lg:text-2xl">Liste des Utilisateurs</h3>
       </div>
    <div class="mb-8 bg-white rounded shadow-sm">   
     <div class="overflow-x-auto">
       <table class="min-w-full">
         <thead>
           <tr class="border-b bg-gray-50">
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Utilisateur</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Dernière activité</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Salaire</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Statut</th>
             <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
           </tr>
         </thead>
         <tbody>
           <tr class="border-b hover:bg-gray-50">
             <td class="px-4 py-3 whitespace-nowrap">
               <div class="flex items-center">
                 <div class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                   <span>me</span>
                 </div>
                 <div class="ml-3">
                   <div class="text-sm font-medium text-gray-900">mohamed</div>
                 </div>
               </div>
             </td>
             <td class="px-4 py-3 whitespace-nowrap">
               <div class="text-sm text-gray-500">medboukab@gmail.com</div>
             </td>
             <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
              il y a 2 heurs
             </td>
             <td class="px-4 py-3 text-sm font-medium text-right text-gray-900 whitespace-nowrap">
               9000 DH
             </td>
             <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
               <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-green-800">
                 active
               </span>
             </td>
             <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
               <button class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">
                   Supprimer
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



@endsection