<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoneyMind - Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <!-- Sidebar - Hidden on mobile, visible on larger screens -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-20 hidden w-64 overflow-y-auto transition-transform duration-200 ease-in-out transform bg-gradient-to-r from-gray-950 to-gray-900 bg-opacity-10 lg:translate-x-0 lg:block">
      <div class="p-6">
        <div class="flex items-center mb-4">
          <i class="mr-2 text-3xl text-blue-500 fas fa-wallet"></i>
          <h1 class="text-2xl font-bold text-white">MoneyMind</h1>
        </div>
        <p class="text-xs text-gray-300">Administration</p>
      </div>
      
      <!-- Section: Tableau de bord -->
      <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">ADMINISTRATION</div>
      <nav>
        <a href="#" class="flex items-center px-6 py-3 m-2 text-white transition rounded bg-blue-500/80">
          <i class="mr-3 fas fa-chart-pie"></i>
          <span>Tableau de bord</span>
        </a>
        <a href="#" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
          <i class="mr-3 fas fa-users"></i>
          <span>Utilisateurs</span>
        </a>
        <a href="#" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
          <i class="mr-3 fas fa-tags"></i>
          <span>Catégories</span>
        </a>
        <a href="#" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
          <i class="mr-3 fas fa-bell"></i>
          <span>Notifications</span>
        </a>
      </nav>
      
      <!-- Section: Paramètres -->
      <div class="px-4 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase">SYSTÈME</div>
      <nav>
        <a href="#" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
          <i class="mr-3 fas fa-cog"></i>
          <span>Paramètres</span>
        </a>
        <form action="#" method="POST" class="flex items-center">
          <button type="submit" class="flex items-center w-full px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
            <i class="mr-3 fas fa-sign-out-alt"></i>
            <span>Déconnexion</span>
          </button>
        </form>
      </nav>
    </div>

    <!-- Mobile sidebar toggle button -->
    <div class="fixed z-30 bottom-4 right-4 lg:hidden">
      <button id="sidebarToggle" class="flex items-center justify-center w-12 h-12 text-white bg-blue-600 rounded-full shadow-lg">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Main Content -->
    <div class="flex-1 w-full lg:ml-64">
      <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex flex-col mb-6 md:flex-row md:items-center md:justify-between">
          <div>
            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Tableau de bord Admin</h2>
            <p class="text-gray-600">Bonjour, Admin! Voici la situation au 06 Mars 2025</p>
          </div>
          <!-- User Profile & Notifications -->
          <div class="flex items-center mt-4 space-x-4 md:mt-0">
            <div class="relative cursor-pointer">
              <i class="text-xl text-gray-600 fas fa-bell"></i>
              <div class="absolute flex items-center justify-center w-4 h-4 bg-red-500 rounded-full -top-1 -right-1">
                <span class="text-xs text-white">3</span>
              </div>
            </div>
            <div class="relative flex items-center cursor-pointer group">
              <div class="flex items-center">
                <div class="flex items-center justify-center w-8 h-8 text-white bg-gray-800 rounded-full">
                  <span>AD</span>
                </div>
                <div class="px-4 py-2 border-b border-gray-100">
                 <p class="font-medium text-gray-800">Admin</p>
                 <p class="text-xs text-gray-500">Compte Administrateur</p>
               </div>
              </div>         
            </div>
          </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-3">
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Utilisateurs totaux</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                <i class="text-blue-700 fas fa-users"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">386</p>
            <div class="flex items-center mt-2 text-xs text-green-800 md:text-sm">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>+12% depuis le mois dernier</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Revenu moyen</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                <i class="text-green-600 fas fa-money-bill-wave"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">7,250 DH</p>
            <div class="flex items-center mt-2 text-xs text-green-600 md:text-sm">
              <i class="mr-1 fas fa-arrow-up"></i>
              <span>+3.5% depuis le mois dernier</span>
            </div>
          </div>
          
          <div class="p-4 bg-white rounded shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-medium text-gray-500">Comptes inactifs</h3>
              <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                <i class="text-red-600 fas fa-user-clock"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 md:text-3xl">24</p>
            <div class="flex items-center mt-2 text-xs text-red-600 md:text-sm">
              <i class="mr-1 fas fa-exclamation-circle"></i>
              <span>Inactifs depuis 2 mois</span>
            </div>
          </div>
        </div>
        
        <!-- Derniers ajouts - Tableaux en deux parties -->
        <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-2">
          <!-- Derniers utilisateurs -->
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">Derniers utilisateurs</h3>
              <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
            </div>
            <div class="overflow-x-auto">
              <table class="min-w-full">
                <thead>
                  <tr class="border-b bg-gray-50">
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Utilisateur</th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Dernière activité</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                          <span>MB</span>
                        </div>
                        <div class="ml-3">
                          <div class="text-sm font-medium text-gray-900">Mohamed Boukab</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="text-sm text-gray-500">m.boukab@example.com</div>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
                      06 Mars 2025
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          <!-- Dernières catégories -->
          <div class="p-6 bg-white rounded shadow-sm">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">Dernières catégories</h3>
              <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Voir plus</a>
            </div>
            <div class="overflow-x-auto">
              <table class="min-w-full">
                <thead>
                  <tr class="border-b bg-gray-50">
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 text-purple-600 bg-purple-100 rounded-full">
                          <i class="fas fa-gamepad"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Divertissement</span>
                      </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                      <div class="text-sm text-gray-500">Dépenses liées aux loisirs et sorties récréatives</div>
                    </td>
                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                      <button class="p-1 text-blue-600 hover:text-blue-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="p-1 text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Tableau complet des utilisateurs -->
        <div class="p-4 mb-8 bg-white rounded shadow-sm sm:p-6">
          <div class="flex flex-col mb-4 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-xl font-bold text-gray-800">Gestion des Utilisateurs</h3>
            <div class="relative mt-3 sm:mt-0">
              <input type="text" placeholder="Rechercher..." class="block w-full px-4 py-2 pl-10 text-gray-700 bg-gray-100 border-none rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="text-gray-400 fas fa-search"></i>
              </div>
            </div>
          </div>
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
                        <span>MB</span>
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Mohamed Boukab</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-500">m.boukab@example.com</div>
                  </td>
                  <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
                    06 Mars 2025
                  </td>
                  <td class="px-4 py-3 text-sm font-medium text-right text-gray-900 whitespace-nowrap">
                    8,000 DH
                  </td>
                  <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                      Actif
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                    <button class="p-1 text-blue-600 hover:text-blue-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="p-1 text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="flex items-center justify-between px-4 py-3 bg-white border-t sm:px-6">
            <div class="flex justify-between flex-1 sm:hidden">
              <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                Précédent
              </a>
              <a href="#" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                Suivant
              </a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Affichage de <span class="font-medium">1</span> à <span class="font-medium">1</span> sur <span class="font-medium">24</span> utilisateurs
                </p>
              </div>
              <div>
                <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                  <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                    <span class="sr-only">Précédent</span>
                    <i class="fas fa-chevron-left"></i>
                  </a>
                  <a href="#" aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900">
                    1
                  </a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                    2
                  </a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                    3
                  </a>
                  <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                    <span class="sr-only">Suivant</span>
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <!-- Tableau complet des catégories -->
        <div class="p-4 mb-8 bg-white rounded shadow-sm sm:p-6">
          <div class="flex flex-col mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-xl font-bold text-gray-800">Gestion des Catégories</h3>
            <button class="flex items-center px-4 py-2 mt-3 text-white transition bg-blue-600 rounded sm:mt-0 hover:bg-blue-700 focus:outline-none">
              <i class="mr-2 fas fa-plus"></i>Ajouter une catégorie
            </button>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="border-b bg-gray-50">
                  <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
                  <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
                  <th class="px-4 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b hover:bg-gray-50">
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex items-center justify-center w-10 h-10 mr-3 text-purple-600 bg-purple-100 rounded-full">
                        <i class="fas fa-gamepad"></i>
                      </div>
                      <h4 class="text-sm font-medium md:text-base">Divertissement</h4>
                    </div>
                  </td>
                  <td class="px-4 py-3">
                    <p class="text-sm text-gray-600">Dépenses liées aux loisirs, jeux vidéo, et sorties récréatives.</p>
                  </td>
                  <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                    <button class="p-1 text-blue-600 hover:text-blue-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="p-1 text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="flex items-center justify-between px-4 py-3 bg-white border-t sm:px-6">
            <div class="flex justify-between flex-1 sm:hidden">
              <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                Précédent
              </a>
              <a href="#" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50">
                Suivant
              </a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Affichage de <span class="font-medium">1</span> à <span class="font-medium">1</span> sur <span class="font-medium">6</span> catégories
                </p>
              </div>
              <div>
                <nav class="inline-flex -space-x-px rounded shadow-sm" aria-label="Pagination">
                  <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                    <span class="sr-only">Précédent</span>
                    <i class="fas fa-chevron-left"></i>
                  </a>
                  <a href="#" aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900">
                    1
                  </a>
                  <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                    2
                  </a>
                  <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                    <span class="sr-only">Suivant</span>
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Mobile sidebar toggle
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      if (sidebar.classList.contains('hidden')) {
        sidebar.classList.remove('hidden');
        sidebar.classList.add('block');
      } else {
        sidebar.classList.remove('block');
        sidebar.classList.add('hidden');
      }
    });
  </script>
</body>
</html>