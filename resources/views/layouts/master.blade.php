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


</head>
<body class="bg-gray-50">
  <div class="flex h-screen"> 
   <button id="openSidebar" class="fixed z-50 p-2 text-white bg-gray-800 rounded top-4 left-4 lg:hidden" onclick="showSidebar()">
    <i class="fas fa-bars"></i>
   </button>
   
      @include('components.sideBar.sideBar')

      @yield('main')

      @yield('modal')

      @yield('toast')
     
      @yield('script')
      
   </div>
</body>
</html>