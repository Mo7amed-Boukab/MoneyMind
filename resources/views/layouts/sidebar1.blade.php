<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 text-white transition-transform duration-200 ease-in-out transform bg-sidebar-blue lg:translate-x-0 lg:block">
   <div class="p-6">
     <div class="flex items-center mb-4">
       <i class="mr-2 text-3xl text-blue-500 fas fa-wallet"></i>
       <h1 class="text-2xl font-bold text-white">MoneyMind</h1>
     </div>
     <p class="text-xs text-gray-300">Administration</p>
   </div>
   
  <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">GENERAL</div>
   <nav>
     <a href="{{route('admin.index')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('admin.index') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
       <i class="mr-3 fas fa-chart-pie"></i>
       <span>Tableau de bord</span>
     </a>
     <a href="{{route('admin.users')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('admin.users') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
       <i class="mr-3 fas fa-users"></i>
       <span>Utilisateurs</span>
     </a>
     <a href="{{route('admin.categorie')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('admin.categorie') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
       <i class="mr-3 fas fa-tags"></i>
       <span>Catégories</span>
     </a>
     <a href="{{route('admin.notification')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded {{ request()->routeIs('admin.notification') ? 'bg-blue-500/80' : 'hover:bg-blue-950 hover:bg-opacity-30' }}">
       <i class="mr-3 fas fa-bell"></i>
       <span>Notifications</span>
     </a>
   </nav>
   
   <div class="px-4 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase">SYSTÈME</div>
   <nav>
     <a href="#" class="flex items-center px-6 py-3 m-2 text-white rounded transition hover:bg-blue-950 hover:bg-opacity-30">
       <i class="mr-3 fas fa-cog"></i>
       <span>Paramètres</span>
     </a>
     <form action="{{ route('logout') }}" method="POST" class="flex items-center">
      @csrf
      <button type="submit" class="flex items-center px-6 py-3 m-2 w-full text-white rounded transition hover:bg-blue-950 hover:bg-opacity-30">
        <i class="mr-3 fas fa-sign-out-alt"></i>
        <span>Déconnexion</span>
      </button>
    </form>
   </nav>
</aside>

<div class="fixed right-4 bottom-4 z-30 lg:hidden">
   <button id="sidebarToggle" class="flex justify-center items-center w-12 h-12 text-white bg-blue-600 rounded-full shadow-lg">
     <i class="fas fa-bars"></i>
   </button>
</div>
