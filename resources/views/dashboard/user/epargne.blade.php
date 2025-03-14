@extends('layouts.master')

@section('main')
    <!-- Main Content -->
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
     <div class="p-6 mx-auto lg:p-8 max-w-7xl">
         <div class="flex items-center justify-between mb-8 md:flex-row">
             <div>
               <h2 class="text-3xl font-bold text-gray-800">Gestion d'Épargne</h2>
               <p class="mt-1 text-gray-600">Planifiez vos objectifs financiers et suivez votre progression</p>
             </div>
         </div>

      <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3 md:gap-6 md:mb-16">
          <!-- Total Épargne -->
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne totale</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                      <i class="text-green-600 fas fa-wallet"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">700 DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-green-600"><i class="mr-1 fas fa-arrow-up"></i> +200 DH</span>
                  <span class="ml-2 text-gray-500">ce mois-ci</span>
              </div>
          </div>
          <!-- Épargne Mensuel -->
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne mensuel</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                      <i class="text-blue-600 fas fa-calendar-alt"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">500 DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-blue-600"><i class="mr-1 fas fa-chart-line"></i> 5%</span>
                  <span class="ml-2 text-gray-500">de l'objectif</span>
              </div>
          </div>
          <!-- Épargne pour Objectif-->
          <div class="p-4 bg-white rounded shadow-sm md:p-6">
              <div class="flex items-center justify-between mb-4">
                  <h3 class="font-medium text-gray-500">Épargne pour Objectifs</h3>
                  <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                      <i class="text-purple-600 fas fa-bullseye"></i>
                  </div>
              </div>
              <p class="text-3xl font-bold text-gray-800">1000 DH</p>
              <div class="flex items-center mt-2 text-sm">
                  <span class="text-purple-600"><i class="mr-1 fas fa-percentage"></i>10%</span>
                  <span class="ml-2 text-gray-500">du salaire</span>
              </div>
          </div>
      </div>


 <!-- Section Header -->
 <div class="flex justify-between w-full mb-6">
  <h3 class="text-3xl font-bold text-gray-800 sm:text-2xl">Objectif Epargne</h3>
   
 </div>

 <!-- Cards Container -->
 <div class="grid grid-cols-1 gap-4 mb-12 md:grid-cols-2">
     <!-- Objectif Mensuel -->
     <div class="relative p-5 bg-white rounded hover:shadow ">
         <!-- Edit Button -->
         <div class="flex justify-between align-center">
             <h3 class="mb-1 text-xl font-medium text-gray-600 ">Objectif Mensuel</h3>
             <button onclick="openObjectifModal()" class="absolute text-gray-600 top-4 right-4 hover:text-blue-600">
                 <i class="fas fa-edit"></i>
             </button>
         </div>
         
         
         <div class="flex items-center justify-between mt-2">
             <div>
               
                 <div class="mt-3">
                     <p class="mb-1 text-sm text-gray-500">Montant à atteindre</p>
                     <p class="text-lg font-medium text-gray-700">1000 DH</p>
                 </div>
             </div>
             
             <div class="relative w-20 h-20">
                 @php
                     $percentMensuel = 40;
                 @endphp
                 
                 <svg class="w-full h-full" viewBox="0 0 100 100">

                     <circle 
                         cx="50" cy="50" r="45" 
                         fill="none" 
                         stroke="#e0e7ff" 
                         stroke-width="6"
                         stroke-dasharray="5,5"
                     />
                     
                     <circle 
                         cx="50" cy="50" r="45" 
                         fill="none" 
                         stroke="#367588" 
                         stroke-width="6"
                         stroke-linecap="round"
                         stroke-dasharray="283"
                         stroke-dashoffset="{{ 283 - (283 * ($percentMensuel / 100)) }}"
                         transform="rotate(-90 50 50)"
                     />

                     <text x="50" y="55" text-anchor="middle" font-size="18" font-weight="bold" fill="#367588">
                         40%
                     </text>
                 </svg>
             </div>
         </div>
     </div>

     <!-- Objectif Annuel -->
     <div class="relative p-5 bg-white rounded hover:shadow">
         <!-- Edit Button -->
         <div class="flex justify-between align-center">
             <h3 class="mb-1 text-xl font-medium text-gray-600">Objectif Annuel</h3>
             <button onclick="openObjectifAnnuelModal()" class="absolute text-gray-600 top-4 right-4 hover:text-blue-600">
                 <i class="fas fa-edit"></i>
             </button>
         </div>
         
         <div class="flex items-center justify-between mt-2">
                 <div class="mt-3">
                     <p class="mb-1 text-sm text-gray-500">Montant à atteindre</p>
                     <p class="text-lg font-medium text-gray-700">20000 DH</p>
                 </div> 
             <div class="relative w-20 h-20">
                 @php
                     $percentAnnuel = 20;
                 @endphp
                 
                 <svg class="w-full h-full" viewBox="0 0 100 100">
                     <circle 
                         cx="50" cy="50" r="45" 
                         fill="none" 
                         stroke="#e0e7ff" 
                         stroke-width="6"
                         stroke-dasharray="5,5"
                     />

                     <circle 
                         cx="50" cy="50" r="45" 
                         fill="none" 
                         stroke="#0C2340" 
                         stroke-width="6"
                         stroke-linecap="round"
                         stroke-dasharray="283"
                         stroke-dashoffset="{{ 283 - (283 * ($percentAnnuel / 100)) }}"
                         transform="rotate(-90 50 50)"
                     />
                     
                     <text x="50" y="55" text-anchor="middle" font-size="18" font-weight="bold" fill="#0C2340">
                         10%
                     </text>
                 </svg>
             </div>
         </div>
     </div>
 </div>

   <!-- Liste de souhaits -->
   <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">   
       <div>
           <h3 class="text-xl font-bold text-gray-800 sm:text-2xl">Liste de souhaits</h3>
       </div>
       <button onclick="openSouhaiteModal()" class="flex items-center justify-center px-4 py-2 text-sm text-white bg-gray-800 rounded sm:w-auto hover:bg-gray-900">
        <i class="mr-2 fas fa-plus"></i> Ajouter un souhait
      </button>
  </div>
   <div class="relative w-full mb-8">
       <div class="w-full p-4 bg-white rounded-lg shadow-sm">
           <div class="overflow-x-auto">
               <div class="inline-block min-w-full align-middle">
                   <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Souhait</th>
                               <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant nécessaire</th>
                               <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Montant épargné</th>
                               <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Progression (%)</th>
                               <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                           </tr>
                       </thead>
                       <tbody class="bg-white divide-y divide-gray-200">
                           <tr class="border-b hover:bg-gray-100">
                               <td class="px-4 py-3 text-sm text-gray-700 md:text-base">test 1</td>
                               <td class="px-4 py-3 text-sm text-gray-700 md:text-base">500 DH</td>
                               <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">100 DH</td>
                               <td class="px-4 py-3 text-sm text-gray-700 sm:table-cell md:text-base">20%</td>
                               <td class="px-4 py-3 text-center">
                                   <button class="px-3 py-1 text-xs text-white rounded sm:px-2 sm:py-1 bg-blue-600/70 hover:bg-blue-700/80">
                                       Ajouter épargne
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
 </div>

@endsection

