<!DOCTYPE html>
<html lang="fr" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>MoneyMind - Gestion Budgétaire Intelligente</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
     tailwind.config = {
         theme: {
             extend: {
                 colors: {
                        'primary': '#2563eb',
                        'dark-blue': '#0f172a',
                        'darker-blue': '#050A1A',
                        'light-blue': '#E6F0FF',
                        'gray-blue': '#7E8CA0'
                 }
             }
         }
     }
 </script>
 <style>
    /* Correction pour le problème de marge sur mobile */
    body, html {
        overflow-x: hidden;
        width: 100%;
        position: relative;
        margin: 0;
        padding: 0;
    }
    
    .container {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }
    
    @media (min-width: 640px) {
        .container {
            max-width: 640px;
        }
    }
    
    @media (min-width: 768px) {
        .container {
            max-width: 768px;
        }
    }
    
    @media (min-width: 1024px) {
        .container {
            max-width: 1024px;
        }
    }
    
    @media (min-width: 1280px) {
        .container {
            max-width: 1280px;
        }
    }
 </style>
</head>
<body class="overflow-x-hidden w-full">
    <header class="fixed top-0 right-0 left-0 z-50 w-full bg-white">
        <div class="container mx-auto lg:px-4 xl:px-16">
            <nav class="hidden justify-between items-center h-20 lg:flex">
                <div class="flex items-center space-x-2">
                    <i class="text-2xl text-primary fas fa-wallet"></i>
                    <span class="text-2xl font-bold text-darker-blue">MoneyMind</span>
                </div>
                
                <div class="flex justify-center items-center md:space-x-2 lg:space-x-6 xl:space-x-8">
                    <a href="#about" class="text-gray-800 hover:text-primary md:text-sm lg:text-base">À propos</a>
                    <a href="#features" class="text-gray-800 hover:text-primary md:text-sm lg:text-base">Fonctionnalités</a>
                    <a href="#how-it-works" class="text-gray-800 hover:text-primary md:text-sm lg:text-base">Comment ça marche</a>
                    <a href="#testimonials" class="text-gray-800 hover:text-primary md:text-sm lg:text-base">Témoignages</a>
                </div>
                
                <div class="flex items-center md:space-x-2 lg:space-x-4">
                 @guest
                        <a href="{{route('login')}}" class="text-gray-800 hover:text-primary md:text-sm lg:text-base">Connexion</a>
                        <a href="{{route('register')}}" class="px-4 py-2 text-white rounded-md transition-colors md:px-4 lg:px-6 bg-primary hover:bg-blue-600 md:text-sm lg:text-base">
                            Inscription
                        </a>
                 @endguest
                  @auth
                  <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                   @csrf
                            <button type="submit" class="px-4 py-2 text-white rounded-md transition-colors md:px-4 lg:px-6 bg-primary hover:bg-blue-600 md:text-sm lg:text-base">
                                Déconnexion
                            </button>
                  </form>
                  @endauth
                </div>
            </nav>

            <nav class="flex justify-between items-center px-4 h-16 lg:hidden">
                <div class="flex items-center space-x-2">
                    <i class="text-xl text-primary fas fa-wallet"></i>
                    <span class="text-xl font-bold text-darker-blue">MoneyMind</span>
                </div>
                <button id="mobileMenuButton" class="text-gray-800">
                    <i class="text-2xl fas fa-bars"></i>
                </button>
            </nav>
        </div>

        <!-- ---------------------------------- Mobile SidBar ------------------------------------ -->
        <div id="mobileSidebar" class="fixed inset-y-0 right-0 z-50 w-64 transition-transform duration-300 translate-x-full bg-darker-blue">
            <div class="flex justify-end p-4">
                <button id="closeMobileMenu" class="text-white">
                    <i class="text-2xl fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col items-center p-4 space-y-4">
                <a href="#about" class="px-4 py-2 w-full text-center text-gray-300 hover:text-primary">
                    À propos
                </a>
                <a href="#features" class="px-4 py-2 w-full text-center text-gray-300 hover:text-primary">
                    Fonctionnalités
               </a>
                <a href="#how-it-works" class="px-4 py-2 w-full text-center text-gray-300 hover:text-primary">
                    Comment ça marche
                </a>
                <a href="#testimonials" class="px-4 py-2 w-full text-center text-gray-300 hover:text-primary">
                    Témoignages
                </a>
                @guest
                    <a href="{{route('login')}}" class="px-4 py-2 w-full text-center text-gray-300 hover:text-primary">
                        Connexion
                    </a>
                    <a href="{{route('register')}}" class="px-4 py-2 w-full text-center text-white rounded-md bg-primary hover:bg-blue-600">
                        Inscription
                </a>
            @endguest
            @auth
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
             @csrf
                        <button type="submit" class="px-4 py-2 w-full text-center text-white rounded-md bg-primary hover:bg-blue-600">
                            Déconnexion
                        </button>
            </form>
            @endauth
            </div>
        </div>
    </header>
    {{-- -------------------------------------- Hero Section ------------------------------------- --}}
    <section class="pt-48 pb-28 bg-dark-blue">
        <div class="container px-8 mx-auto text-center lg:px-16">
            <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up" data-aos-duration="800">
                Simplifiez votre gestion budgétaire
            </h1>
            <h2 class="mb-6 text-2xl font-light text-primary" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">avec l'intelligence artificielle</h2>
            <p class="mx-auto mb-10 max-w-3xl text-lg text-gray-300" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                MoneyMind vous aide à suivre vos revenus, dépenses et objectifs d'épargne, tout en vous proposant des suggestions personnalisées pour améliorer votre santé financière.
            </p>
            <div class="flex flex-col justify-center items-center space-y-4 md:flex-row md:space-y-0 md:space-x-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <a href="{{route('register')}}" class="px-8 py-2 w-full text-lg text-white rounded-md transition-colors md:w-auto bg-primary hover:bg-blue-600">
                    Commencer gratuitement
                </a>
                <a href="#about" class="px-8 py-2 w-full text-lg text-white bg-transparent rounded-md border border-white transition-colors md:w-auto hover:bg-white/10">
                    Voir détails
                </a>
            </div>
        </div>
    </section>
      {{-- ------------------------------------ About Section ------------------------------------- --}}
    <section id="about" class="py-20 bg-white">
        <div class="container px-8 mx-auto lg:px-16">
            <div class="mx-auto mb-16 max-w-3xl text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark-blue md:text-4xl" data-aos="fade-up" data-aos-duration="800">
                    À propos de MoneyMind
                </h2>
                <p class="text-gray-600" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">Notre mission est de rendre la gestion financière accessible à tous</p>
            </div>
            <div class="mx-auto max-w-3xl text-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <p class="mb-6 text-lg leading-relaxed text-gray-600">
                    MoneyMind est une plateforme innovante de gestion budgétaire qui combine intelligence artificielle et simplicité d'utilisation. Nous aidons nos utilisateurs à suivre leurs finances, automatiser leurs dépenses récurrentes et recevoir des conseils personnalisés pour atteindre leurs objectifs financiers.
                </p>
                <p class="text-lg leading-relaxed text-gray-600">
                    Notre technologie d'IA analyse vos habitudes de dépenses pour vous offrir des suggestions pertinentes, vous permettant ainsi de prendre de meilleures décisions financières au quotidien et d'avancer sereinement vers vos projets d'avenir.
                </p>
            </div>
        </div>
    </section>
    {{-- -------------------------------------- Fonctionality Section ------------------------------------- --}}
    <section id="features" class="py-20 bg-light-blue">
        <div class="container px-8 mx-auto lg:px-16">
            <div class="mx-auto mb-16 max-w-3xl text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark-blue md:text-4xl" data-aos="fade-up" data-aos-duration="800">
                    Fonctionnalités intelligentes
                </h2>
                <p class="text-gray-600" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">Des outils puissants pour prendre le contrôle de vos finances</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-white rounded transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-chart-line"></i>
                    </div>
                 <h3 class="mb-3 text-xl font-semibold text-dark-blue">Suivi automatique</h3>
                 <p class="text-gray-600">Gestion automatique des salaires et dépenses récurrentes pour ne jamais manquer un paiement important.</p>
                </div>
                <div class="p-6 bg-white rounded-md transition-all duration-300 hover:scale-105 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-bullseye"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold text-dark-blue">Objectifs d'épargne</h3>
                    <p class="text-gray-600">Définissez des objectifs d'épargne mensuels et suivez votre progression vers vos ambitions financières.</p>
                </div>
                <div class="p-6 bg-white rounded-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-bell"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold text-dark-blue">Alertes budgétaires</h3>
                    <p class="text-gray-600">Recevez des notifications lorsque vous approchez ou dépassez vos seuils budgétaires personnalisés.</p>
                </div>
                <div class="p-6 bg-white rounded-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-brain"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold text-dark-blue">IA Conseillère</h3>
                    <p class="text-gray-600">Obtenez des suggestions intelligentes basées sur vos habitudes de dépenses grâce à notre technologie d'intelligence artificielle avancée.</p>
                </div>
                <div class="p-6 bg-white rounded-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="500">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-list-check"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold text-dark-blue">Liste de souhaits</h3>
                    <p class="text-gray-600">Ajoutez vos envies et suivez votre progression d'épargne vers chaque objectif d'achat.</p>
                </div>
                <div class="p-6 bg-white rounded-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="600">
                    <div class="flex justify-center items-center mb-4 w-12 h-12 text-white rounded-full bg-primary">
                        <i class="text-xl fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold text-dark-blue">Multi-appareils</h3>
                    <p class="text-gray-600">Accédez à votre tableau de bord depuis n'importe quel appareil grâce à notre design responsive.</p>
                </div>
            </div>
        </div>
    </section>  
     {{-- -------------------------------------- How it Works Section ------------------------------------- --}}
    <section id="how-it-works" class="py-20 bg-white">
        <div class="container px-8 mx-auto lg:px-16">
            <div class="mx-auto mb-16 max-w-3xl text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark-blue md:text-4xl" data-aos="fade-up" data-aos-duration="800">
                    Comment ça marche
                </h2>
                <p class="text-gray-600" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">Trois étapes simples pour  er votre gestion financière</p>
            </div>          
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="relative z-10 p-8 text-center bg-white rounded-md shadow-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
                        <div class="flex justify-center items-center mx-auto mb-6 w-16 h-16 text-2xl font-bold text-white rounded-full bg-primary">1</div>
                        <h3 class="mb-4 text-xl font-bold text-dark-blue">Inscrivez-vous</h3>
                        <p class="mb-6 text-gray-600">Créez votre compte en quelques clics et configurez votre profil financier</p>
                        <ul class="pl-5 space-y-2 list-disc text-left text-gray-600">
                            <li>Inscription rapide et sécurisée</li>
                            <li>Saisie de votre salaire mensuel</li>
                            <li>Configuration de la date de crédit</li>
                            <li>Automatisation du Salaire</li>
                        </ul>
                </div>
                    <div class="relative z-10 p-8 text-center bg-white rounded-md shadow-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <div class="flex justify-center items-center mx-auto mb-6 w-16 h-16 text-2xl font-bold text-white rounded-full bg-primary">2</div>
                        <h3 class="mb-4 text-xl font-bold text-dark-blue">Personnalisez votre budget</h3>
                        <p class="mb-6 text-gray-600">Ajoutez vos dépenses récurrentes et définissez vos objectifs financiers</p>
                        <ul class="pl-5 space-y-2 list-disc text-left text-gray-600">
                            <li>Ajoute des dépenses quotidien</li>
                            <li>Automatisation des dépenses récurrentes</li>
                            <li>Définition des objectifs d'épargne</li>
                            <li>Ajoute des listes des souhaites</li>
                        </ul>
                </div>
                    <div class="relative z-10 p-8 text-center bg-white rounded-md shadow-md transition-all duration-300 hover:scale-105 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
                        <div class="flex justify-center items-center mx-auto mb-6 w-16 h-16 text-2xl font-bold text-white rounded-full bg-primary">3</div>
                        <h3 class="mb-4 text-xl font-bold text-dark-blue">Optimisez vos finances</h3>
                        <p class="mb-6 text-gray-600">Suivez vos progrès et recevez des conseils personnalisés de notre IA</p>
                        <ul class="pl-5 space-y-2 list-disc text-left text-gray-600">
                            <li>Tableau de bord intuitif en temps réel</li>
                            <li>Suggestions d'optimisation par IA</li>
                            <li>Rapports détaillés sur vos finances</li>
                            <li>Alertes et notifications personnalisées</li>
                        </ul>
                </div>
            </div>
        </div>
    </section> 
    <!----------------------------------------- CTA Section -------------------------------------------->
    <section class="py-20 text-white bg-dark-blue">
        <div class="container px-8 mx-auto text-center lg:px-16">
            <h2 class="mb-4 text-3xl font-bold md:text-4xl" data-aos="fade-up" data-aos-duration="800">
                Commencez votre voyage vers la liberté financière
            </h2>
            <p class="mx-auto mb-8 max-w-2xl text-lg text-gray-300" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                Rejoignez des milliers d'utilisateurs qui ont amélioré leur santé financière grâce à MoneyMind
            </p>
            <div class="flex flex-col justify-center items-center space-y-4 md:flex-row md:space-y-0 md:space-x-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <a href="{{route('register')}}" class="px-8 py-2 w-full text-lg text-white rounded-md transition-colors md:w-auto bg-primary hover:bg-blue-600">
                    S'inscrire gratuitement
                </a>
                <a href="#contact" class="px-8 py-2 w-full text-lg bg-transparent rounded-md border transition-colors md:w-auto text-primary border-primary hover:bg-primary/10">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>
    <!---------------------------------------- Testimonials Section ----------------------------------------->
   <section id="testimonials" class="py-20 bg-white">
    <div class="container px-8 mx-auto lg:px-16">
        <div class="mx-auto mb-16 max-w-3xl text-center">
            <h2 class="mb-4 text-3xl font-bold text-dark-blue md:text-4xl" data-aos="fade-up" data-aos-duration="800">
                Ce que nos clients disent
            </h2>
            <p class="text-gray-600" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">Découvrez comment MoneyMind  e la gestion financière de nos utilisateurs</p>
        </div>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 rounded-md shadow-sm transition-all duration-300 bg-light-blue hover:scale-105 hover:shadow-lg" data-aos="flip-left" data-aos-duration="800" data-aos-delay="100">
                <div class="flex mb-4 text-primary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="mb-6 italic text-gray-600">
                    "MoneyMind a complètement changé ma façon de gérer mon budget. Les suggestions de l'IA sont vraiment pertinentes et m'ont permis d'économiser plus de 200€ par mois sans effort."
                </p>
                <div class="flex items-center">
                    <div class="flex justify-center items-center mr-4 w-12 h-12 text-white rounded-full bg-primary">
                        <span class="text-lg font-bold">SM</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-dark-blue">Sophie Martin</h4>
                        <p class="text-sm text-gray-500">Utilisatrice depuis 8 mois</p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-md shadow-sm transition-all duration-300 bg-light-blue hover:scale-105 hover:shadow-lg" data-aos="flip-left" data-aos-duration="800" data-aos-delay="200">
                <div class="flex mb-4 text-primary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="mb-6 italic text-gray-600">
                    "La fonctionnalité de dépenses récurrentes automatiques est géniale. Je n'ai plus à m'inquiéter d'oublier un paiement important. L'application est intuitive et le support client est exceptionnel."
                </p>
                <div class="flex items-center">
                    <div class="flex justify-center items-center mr-4 w-12 h-12 text-white rounded-full bg-primary">
                        <span class="text-lg font-bold">TD</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-dark-blue">Thomas Dubois</h4>
                        <p class="text-sm text-gray-500">Utilisateur depuis 1 an</p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-md shadow-sm transition-all duration-300 bg-light-blue hover:scale-105 hover:shadow-lg" data-aos="flip-left" data-aos-duration="800" data-aos-delay="300">
                <div class="flex mb-4 text-primary">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="mb-6 italic text-gray-600">
                    "Grâce à MoneyMind, j'ai pu atteindre mon objectif d'épargne pour les vacances en seulement 6 mois. Les alertes budgétaires m'ont aidé à rester discipliné et à mieux comprendre mes habitudes de dépenses."
                </p>
                <div class="flex items-center">
                    <div class="flex justify-center items-center mr-4 w-12 h-12 text-white rounded-full bg-primary">
                        <span class="text-lg font-bold">LB</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-dark-blue">Laura Blanc</h4>
                        <p class="text-sm text-gray-500">Utilisatrice depuis 6 mois</p>
                    </div>
                </div>
            </div>
     </div>
     <div class="mt-12 text-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
         <a href="#" class="inline-flex items-center text-primary hover:underline">
             Voir plus de témoignages
             <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
             </svg>
         </a>
         </div>
     </div>
   </section>
    <!-- -------------------------------------- Footer Section -------------------------------------- -->
    <footer class="py-12 text-white border-t border-gray-800 bg-darker-blue">
        <div class="container px-8 mx-auto lg:px-16">
            <div class="grid gap-8 mb-8 md:grid-cols-2 lg:grid-cols-4">
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <div class="flex items-center mb-4 space-x-2">
                        <i class="text-xl text-primary fas fa-wallet"></i>
                        <span class="text-xl font-bold text-white">MoneyMind</span>
                    </div>
                    <p class="mb-4 text-gray-400">
                        Simplifiez votre gestion budgétaire et prenez le contrôle de vos finances avec l'aide de l'intelligence artificielle.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-lg text-gray-400 hover:text-primary"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-primary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-lg text-gray-400 hover:text-primary"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h4 class="mb-4 text-lg font-medium text-white">Produit</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-primary">Fonctionnalités</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-primary">Témoignages</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-primary">FAQ</a></li>
                        <li><a href="#support" class="text-gray-400 hover:text-primary">Support</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <h4 class="mb-4 text-lg font-medium text-white">Ressources</h4>
                    <ul class="space-y-2">
                        <li><a href="#blog" class="text-gray-400 hover:text-primary">Blog</a></li>
                        <li><a href="#guides" class="text-gray-400 hover:text-primary">Guides</a></li>
                        <li><a href="#webinars" class="text-gray-400 hover:text-primary">Webinaires</a></li>
                        <li><a href="#education" class="text-gray-400 hover:text-primary">Éducation financière</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <h4 class="mb-4 text-lg font-medium text-white">Entreprise</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-400 hover:text-primary">À propos</a></li>
                        <li><a href="#careers" class="text-gray-400 hover:text-primary">Carrières</a></li>
                        <li><a href="#privacy" class="text-gray-400 hover:text-primary">Confidentialité</a></li>
                        <li><a href="#terms" class="text-gray-400 hover:text-primary">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 text-center border-t border-gray-800" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                <p class="text-sm text-gray-400">
                    © 2024 MoneyMind. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
    <script>
        // Correction pour le problème de défilement horizontal
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier la largeur de tous les éléments par rapport à la fenêtre
            const windowWidth = window.innerWidth;
            const elements = document.querySelectorAll('*');
            
            elements.forEach(element => {
                if (element.offsetWidth > windowWidth) {
                    console.log('Élément trop large:', element);
                    element.style.maxWidth = '100%';
                    element.style.overflowX = 'hidden';
                }
            });
            
            // Initialisation AOS avec animations activées sur mobile
            AOS.init({
                once: false,
                offset: 120,
                duration: 800,
                easing: 'ease-out-cubic'
            });
        });

        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileSidebar = document.getElementById('mobileSidebar');

        mobileMenuButton.addEventListener('click', () => {
            mobileSidebar.classList.remove('translate-x-full');
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileSidebar.classList.add('translate-x-full');
        });
        document.addEventListener('click', (e) => {
            if (!mobileSidebar.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileSidebar.classList.add('translate-x-full');
            }
        });
    </script>
</body>
</html>