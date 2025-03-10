<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoneyMind - Tableau de Bord</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <style>
    /* Styles pour les tableaux responsives */
    .overflow-x-auto {
        -webkit-overflow-scrolling: touch;
    }
    
    /* Assurer que le contenu principal ne déborde pas */
    #mainContent {
        max-width: 100vw;
        overflow-x: hidden;
    }
    
    /* Style pour les conteneurs de tableaux */
    .table-container {
        position: relative;
        margin-bottom: 1rem;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    /* Ajuster la largeur minimale des colonnes sur mobile */
    @media (max-width: 640px) {
        .table-cell-min {
            min-width: 120px;
        }
        .table-cell-action {
            min-width: 100px;
        }
    }
  </style>
  <script>
   tailwind.config = {
       theme: {
           extend: {
               colors: {
                   'primary-blue': '#2563eb',
                   'sidebar-blue': '#0f172a',
                   'yale-blue': '#00356B',
                   'teal-blue': '#367588',
                   'light-blue': '#dbeafe',
                   'extra-light-blue': '#eff6ff',
               }
           }
       }
   }
</script>


</head>
<body class="bg-gray-50">
  <div class="flex h-screen"> 
    {{-- <!-- Bouton Toggle Sidebar -->
    <button id="sidebarToggle" class="fixed z-50 p-2 text-white bg-gray-800 rounded top-4 left-4 lg:hidden">
      <i class="fas fa-bars"></i>
    </button> --}}

    @if(auth()->check() && auth()->user()->role == 'user')
      @include('layouts.sidebar1')
    @else
      @include('layouts.sidebar2')
    @endif
      
    @yield('main')
    @yield('modal')
    @yield('toast')
    
    <script>
      // Toggle sidebar
      document.getElementById('sidebarToggle').addEventListener('click', function() {
          const sidebar = document.querySelector('[id^="sidebar"]'); 
          if (sidebar.classList.contains('-translate-x-full')) {
              sidebar.classList.remove('-translate-x-full');
              sidebar.classList.add('translate-x-0');
          } else {
              sidebar.classList.remove('translate-x-0');
              sidebar.classList.add('-translate-x-full');
          }
      });
      document.addEventListener('click', function(event) {
          const sidebar = document.querySelector('[id^="sidebar"]');
          const sidebarToggle = document.getElementById('sidebarToggle');
          
          if (window.innerWidth < 1024 && 
              !sidebar.contains(event.target) && 
              !sidebarToggle.contains(event.target)) {
              
              sidebar.classList.remove('translate-x-0');
              sidebar.classList.add('-translate-x-full');
          }
      });
    </script>

    @yield('script')
  </div>
</body>
</html>