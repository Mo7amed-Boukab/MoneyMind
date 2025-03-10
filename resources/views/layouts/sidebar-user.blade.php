<div id="sidebar-user" class="fixed inset-y-0 left-0 z-20 hidden w-64 overflow-y-auto transition-transform duration-200 ease-in-out transform bg-gradient-to-r from-gray-950 to-gray-900 bg-opacity-10 lg:translate-x-0 lg:block">
    <div class="p-6">
        <div class="flex items-center mb-4">
            <i class="mr-2 text-3xl text-blue-500 fas fa-wallet"></i>
            <h1 class="text-2xl font-bold text-white">MoneyMind</h1>
        </div>
        <p class="text-xs text-gray-300">Mon Compte</p>
    </div>
    
    <!-- Section: Menu utilisateur -->
    <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">MENU</div>
    <nav>
        <a href="{{route('dashboard')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('dashboard') ? 'bg-blue-500/80' : 'hover:bg-gray-900' }}">
            <i class="mr-3 fas fa-chart-pie"></i>
            <span>Tableau de bord</span>
        </a>
        <!-- Autres liens utilisateur... -->
    </nav>
</div> 