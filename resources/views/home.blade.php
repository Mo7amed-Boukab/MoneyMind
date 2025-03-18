<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Gestion Budgétaire Intelligente</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
     tailwind.config = {
         theme: {
             extend: {
                 colors: {
                     'primary-blue': '#2563eb',
                     'dark-blue': '#1e3a8a',
                     'sidebar-blue': '#0f172a',
                     'light-blue': '#dbeafe',
                     'extra-light-blue': '#eff6ff',
                     'success-green': '#34d399',
                     'danger-red': '#f87171',
                     'warning-orange': '#fdba74',
                 }
             }
         }
     }
 </script>
</head>
<body class="text-gray-100 bg-gray-900 ">
    <header class="border-b border-gray-800">
        <div class="container px-4 mx-auto">
            <!-- Desktop Navbar -->
            <nav class="items-center justify-between hidden py-4 md:flex md:px-16">
                <div class="flex items-center text-2xl font-bold">
                    <span class="mr-3 text-blue-500">
                        <i class="fas fa-wallet"></i>
                    </span>
                    MoneyMind
                </div>
                
                <div class="flex space-x-4">
                 @guest
                 <a href="{{route('login')}}" class="px-6 py-2 text-white border border-white rounded hover:bg-white hover:bg-opacity-10">Connexion</a>
                 <a href="{{route('register')}}" class="px-6 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">S'inscrire</a>
                 @endguest
                  @auth
                  <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                   @csrf
                      <button type="submit" class="px-6 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Déconnexion</button>
                  </form>
                  @endauth
                </div>
            </nav>

            <!-- Mobile Navbar -->
            <nav class="flex items-center justify-between py-4 md:hidden">
                <div class="flex items-center text-2xl font-bold">
                    <span class="mr-3 text-blue-500">
                        <i class="fas fa-wallet"></i>
                    </span>
                    MoneyMind
                </div>
                <button id="mobileMenuButton" class="text-white">
                    <i class="text-2xl fas fa-bars"></i>
                </button>
            </nav>
        </div>

        <!-- Mobile Menu Sidebar -->
        <div id="mobileSidebar" class="fixed inset-y-0 right-0 z-50 w-64 transform translate-x-full transition-transform duration-300 bg-sidebar-blue">
            <div class="flex justify-end p-4">
                <button id="closeMobileMenu" class="text-white">
                    <i class="text-2xl fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col items-center space-y-4 p-4">
             @guest
                <a href="{{route('login')}}" class="w-full px-6 py-2 text-center text-white border border-white rounded hover:bg-white hover:bg-opacity-10">
                    Connexion
                </a>
                <a href="{{route('register')}}" class="w-full px-6 py-2 text-center text-white bg-blue-500 rounded hover:bg-blue-700">
                    S'inscrire
                </a>
            @endguest
            @auth
            <form action="{{ route('logout') }}" method="POST" class="flex items-center">
             @csrf
                <button type="submit" class="w-full px-6 py-2 text-center text-white bg-blue-500 rounded hover:bg-blue-700">Déconnexion</button>
            </form>
            @endauth
            </div>
        </div>
    </header>

    <section class="relative overflow-hidden text-center bg-opacity-50 bg-gradient-to-b from-black to-gray-900">
        <div class="absolute inset-0 transform scale-150 -translate-y-1/2 bg-blue-500 rounded-full bg-opacity-5 -translate-x-1/4"></div>
        <div class="container relative z-10 px-4 py-32 mx-auto">
            <h1 class="mb-6 text-4xl font-bold leading-tight md:text-5xl">Simplifiez votre gestion budgétaire</h1>
            <h2 class="mb-6 text-2xl font-light text-blue-100 6 md:text-3xl">avec l'intelligence artificielle</h2>
            <p class="max-w-2xl mx-auto mb-6 text-gray-400">MoneyMind vous aide à suivre vos revenus, dépenses et objectifs d'épargne, tout en vous proposant des suggestions personnalisées pour améliorer votre santé financière.</p>
            <div class="flex flex-col justify-center gap-4 mt-8 mb-16 md:flex-row">
                <a href="{{route('register')}}" class="px-6 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-700">Commencer gratuitement</a>
                <a href="#" class="px-6 py-2 font-medium text-white border border-white rounded hover:bg-white hover:bg-opacity-10">Voir Details</a>
            </div>
        </div>
    </section>

    <section id="features" class="py-16 bg-gray-900 bg-opacity-50">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-3 text-2xl font-bold md:text-3xl">Fonctionnalités intelligentes</h2>
                <p class="max-w-xl mx-auto text-sm text-gray-400 md:text-base">Des outils puissants pour prendre le contrôle de vos finances</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 md:gap-6">
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-chart-line"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Suivi automatique</h3>
                    <p class="text-gray-400">Gestion automatique des salaires et dépenses récurrentes pour ne jamais manquer un paiement important.</p>
                </div>
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-bullseye"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Objectifs d'épargne</h3>
                    <p class="text-gray-400">Définissez des objectifs d'épargne mensuels et suivez votre progression vers vos ambitions financières.</p>
                </div>
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-bell"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Alertes budgétaires</h3>
                    <p class="text-gray-400">Recevez des notifications lorsque vous approchez ou dépassez vos seuils budgétaires personnalisés.</p>
                </div>
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-brain"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">IA Conseillère</h3>
                    <p class="text-gray-400">Obtenez des suggestions intelligentes basées sur vos habitudes de dépenses grâce à notre technologie d'intelligence artificielle avancée.</p>
                </div>
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-list-check"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Liste de souhaits</h3>
                    <p class="text-gray-400">Ajoutez vos envies et suivez votre progression d'épargne vers chaque objectif d'achat.</p>
                </div>
                <div class="h-full p-6 transition-transform duration-300 bg-gray-800 rounded bg-opacity-30 hover:transform hover:-translate-y-1 hover:border hover:border-blue-500 hover:border-opacity-30">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 text-blue-500 bg-blue-900 rounded-full bg-opacity-20">
                        <i class="text-xl fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Multi-appareils</h3>
                    <p class="text-gray-400">Accédez à votre tableau de bord depuis n'importe quel appareil grâce à notre design responsive.</p>
                </div>
            </div>
        </div>
    </section>  
   

    <section class="py-8 bg-gray-800 md:py-12">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-4">
                <div class="p-4">
                    <div class="mb-2 text-4xl font-bold text-blue-500">15K+</div>
                    <div class="text-lg text-gray-400">Utilisateurs actifs</div>
                </div>
                <div class="p-4">
                    <div class="mb-2 text-4xl font-bold text-blue-500">98%</div>
                    <div class="text-lg text-gray-400">Taux de satisfaction</div>
                </div>
                <div class="p-4">
                    <div class="mb-2 text-4xl font-bold text-blue-500">25%</div>
                    <div class="text-lg text-gray-400">Économies moyennes</div>
                </div>
                <div class="p-4">
                    <div class="mb-2 text-4xl font-bold text-blue-500">4.8/5</div>
                    <div class="text-lg text-gray-400">Note moyenne</div>
                </div>
            </div>
        </div>
    </section> 

    
    <section class="py-32 text-center bg-gradient-to-t from-gray-950 to-gray-900 bg-opacity-10">
     <div class="container px-4 mx-auto">
         <h2 class="mb-4 text-3xl font-bold">Commencez votre voyage vers la liberté financière</h2>
         <p class="max-w-xl mx-auto mb-6 text-gray-300">Rejoignez des milliers d'utilisateurs qui ont amélioré leur santé financière grâce à MoneyMind</p>
         <div class="flex flex-col justify-center gap-4 md:flex-row">
             <a href="#signup" class="px-6 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-700">S'inscrire gratuitement</a>
             <a href="#contact" class="px-6 py-2 font-medium text-blue-500 border border-blue-500 rounded hover:bg-blue-900 hover:bg-opacity-10">Nous contacter</a>
         </div>
     </div>
   </section>

    <footer class="py-12 pl-16 pr-16 bg-gray-900 border-t border-gray-800">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <div class="flex items-center mb-4 text-xl font-bold">
                        <span class="mr-3 text-blue-500">
                            <i class="fas fa-wallet"></i>
                        </span>
                        MoneyMind
                    </div>
                    <p class="mb-4 text-gray-400">Simplifiez votre gestion budgétaire et prenez le contrôle de vos finances avec l'aide de l'intelligence artificielle.</p>
                    <div class="flex gap-4">
                        <a href="#" class="text-lg text-gray-400 hover:text-blue-500"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-blue-500"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-blue-500"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="mb-4 text-lg font-medium">Produit</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-blue-500">Fonctionnalités</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-blue-500">Témoignages</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-blue-500">FAQ</a></li>
                        <li><a href="#support" class="text-gray-400 hover:text-blue-500">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 text-lg font-medium">Ressources</h4>
                    <ul class="space-y-2">
                        <li><a href="#blog" class="text-gray-400 hover:text-blue-500">Blog</a></li>
                        <li><a href="#guides" class="text-gray-400 hover:text-blue-500">Guides</a></li>
                        <li><a href="#webinars" class="text-gray-400 hover:text-blue-500">Webinaires</a></li>
                        <li><a href="#education" class="text-gray-400 hover:text-blue-500">Éducation financière</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 text-lg font-medium">Entreprise</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-400 hover:text-blue-500">À propos</a></li>
                        <li><a href="#careers" class="text-gray-400 hover:text-blue-500">Carrières</a></li>
                        <li><a href="#privacy" class="text-gray-400 hover:text-blue-500">Confidentialité</a></li>
                        <li><a href="#terms" class="text-gray-400 hover:text-blue-500">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-4 text-sm text-center text-gray-500 border-t border-gray-800">
                © 2025 MoneyMind. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileSidebar = document.getElementById('mobileSidebar');

        mobileMenuButton.addEventListener('click', () => {
            mobileSidebar.classList.remove('translate-x-full');
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileSidebar.classList.add('translate-x-full');
        });

        // Fermer le menu si on clique en dehors
        document.addEventListener('click', (e) => {
            if (!mobileSidebar.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileSidebar.classList.add('translate-x-full');
            }
        });
    </script>
</body>
</html> 

                               
                  