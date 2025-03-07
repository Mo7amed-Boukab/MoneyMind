<!-- Sidebar -->
<div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 text-white transition-transform duration-200 ease-in-out transform bg-gradient-to-r from-gray-950 to-gray-900 bg-opacity-10 lg:translate-x-0 lg:block">
 
 <div class="p-6">
   <div class="flex items-center mb-4">
     <i class="mr-2 text-3xl text-blue-500 fas fa-wallet"></i>
     <h1 class="text-2xl font-bold text-white">MoneyMind</h1>
     <button id="closeSidebar" class="absolute text-white right-4 lg:hidden" onclick="hideSidebar()">
         <i class="fas fa-times"></i>
     </button>
   </div>
   <p class="text-xs text-gray-300">Gestion de budget intelligente</p>
 </div>


 <!-- Section: Tableau de bord -->
 <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">GENERAL</div>
 <nav>
   <a href="{{route('user.index')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded bg-blue-500/80">
     <i class="mr-3 fas fa-chart-pie"></i>
     <span>Vue d'ensemble</span>
   </a>
   <a href="{{route('user.depense')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
     <i class="mr-3 fas fa-wallet"></i>
     <span>Dépenses</span>
   </a>
   <a href="{{route('user.revenu')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
     <i class="mr-3 fas fa-money-bill-wave"></i>
     <span>Revenus</span>
   </a>
   <a href="{{route('user.epargne')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
     <i class="mr-3 fas fa-piggy-bank"></i>
     <span>Épargne</span>
   </a>
   <a href="{{route('user.notification')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
     <i class="mr-3 fas fa-bell"></i>
     <span>Notifications</span>
   </a>
 </nav>  
 <!-- Section: Paramètres -->
 <div class="px-4 py-2 mt-4 text-xs font-semibold text-gray-400 uppercase">Compte</div>
 <nav>
   <a href="{{route('user.profile')}}" class="flex items-center px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
     <i class="mr-3 fas fa-user"></i>
     <span>Profil</span>
   </a>
   <form action="{{ route('logout') }}" method="POST" class="flex items-center">
     @csrf
     <button type="submit" class="flex items-center w-full px-6 py-3 m-2 text-white transition rounded hover:bg-gray-900">
       <i class="mr-3 fas fa-sign-out-alt"></i>
       <span>Déconnexion</span>
     </button>
   </form>
 </nav>

</div>

<script>
     function showSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('openSidebar').classList.add('hidden');
      }
      function hideSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('openSidebar').classList.remove('hidden');
      }
</script>
