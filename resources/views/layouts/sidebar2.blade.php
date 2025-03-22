
<aside id="sidebar1" class="fixed inset-y-0 left-0 z-40 w-64 transition-transform duration-300 transform -translate-x-full bg-sidebar-blue lg:translate-x-0">
 
 <div class="p-6">
   <div class="flex items-center mb-4">
     <i class="mr-2 text-3xl text-blue-500 fas fa-wallet"></i>
     <h1 class="text-2xl font-bold text-white">MoneyMind</h1>
   </div>
   <p class="text-xs text-gray-300">Gestion de budget intelligente</p>
 </div>

 <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">GENERAL</div>
 <nav>
   <a href="{{route('user.index')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.index') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-chart-pie"></i>
     <span>Vue d'ensemble</span>
   </a>
   <a href="{{route('user.depense')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.depense') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-wallet"></i>
     <span>Dépenses</span>
   </a>
   <a href="{{route('user.revenu')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.revenu') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-money-bill-wave"></i>
     <span>Revenus</span>
   </a>
   <a href="{{route('user.epargne')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.epargne') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-piggy-bank"></i>
     <span>Épargne</span>
   </a>
   <a href="{{ route('user.historique') }}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.historique') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
    <i class="w-5 h-5 mr-3 fas fa-history"></i>
    <span>Historique</span>
  </a>
   <a href="{{route('user.notification')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.notification') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-bell"></i>
     <span>Notifications</span>
   </a>
 </nav>  

 <div class="px-4 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase">Compte</div>
 <nav>
   <a href="{{route('user.profile')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('user.profile') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
     <i class="mr-3 fas fa-user"></i>
     <span>Profil</span>
   </a>
   <form action="{{ route('logout') }}" method="POST" class="flex items-center">
     @csrf
     <button type="submit" class="flex items-center w-full px-6 py-3 m-2 text-white transition rounded hover:bg-blue-950 hover:bg-opacity-30">
       <i class="mr-3 fas fa-sign-out-alt"></i>
       <span>Déconnexion</span>
     </button>
   </form>
 </nav>

</aside>

<div class="fixed z-30 bottom-4 right-4 lg:hidden">
  <button id="sidebarToggle" class="flex items-center justify-center w-12 h-12 text-white bg-blue-600 rounded-full shadow-lg">
    <i class="fas fa-bars"></i>
  </button>
</div>
