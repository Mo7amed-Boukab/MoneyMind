<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#2563eb',
                        'dark-blue': '#0f172a',
                        'darker-blue': '#050A1A',
                        'light-blue': '#E6F0FF',
                        'extra-light-blue': '#eff6ff',
                        'success-green': '#34d399',
                        'danger-red': '#f87171',
                        'warning-orange': '#fdba74',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 md:flex-row">
    <div class="relative flex flex-col items-center justify-center w-full p-6 text-white md:w-1/2 bg-dark-blue md:p-8">
        <div class="absolute top-4 right-4 bg-white/10 text-white py-1.5 px-3 rounded-md text-xs cursor-pointer flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
            FR
        </div>
        
        <div class="relative max-w-md text-center z-2">
         <div class="flex items-center gap-3 mb-6 md:mb-10">
             <div class="flex items-center gap-3 mb-6 md:mb-10">
                 <i class="mr-2 text-4xl text-primary fas fa-wallet"></i>
                <span class="text-3xl font-bold text-white">MoneyMind</span>
             </div>
        </div>
            
            <h1 class="mb-2 text-2xl font-bold text-white md:text-3xl md:mb-4">Gestion de budget intelligente</h1>
            <div class="mb-2 text-sm text-slate-400">Simplifiez vos finances, atteignez vos objectifs</div>
            
            <div class="grid w-full max-w-md grid-cols-2 gap-3 mt-6 md:gap-4 md:mt-10">
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex items-center justify-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Suivi des dépenses</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex items-center justify-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Dépenses récurrentes</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex items-center justify-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Objectifs d'épargne</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex items-center justify-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Suggestions IA</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="flex flex-col items-center justify-center w-full p-6 bg-white md:w-1/2 md:p-8">
        <div class="w-full max-w-md">
            <h2 class="mb-2 text-3xl font-black text-center text-dark-blue md:text-2xl md:mb-4">Connexion à votre compte</h2>
            <p class="mb-6 text-sm leading-relaxed text-center text-gray-800 md:mb-8 md:text-base">Reprenez le contrôle de vos finances</p>
 
             <form action="{{ route('login') }}" method="POST" class="space-y-4 md:space-y-5">
              @csrf
                <div class="relative">
                    <div class="absolute -translate-y-1/2 left-3 md:left-4 top-1/2 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <input type="email" name="email" placeholder="Adresse email" class="w-full py-2.5 md:py-3 pl-9 md:pl-10 pr-3 border border-slate-200 rounded-md text-sm focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10 transition" required>
                </div>
                
                <div class="relative">
                    <div class="absolute -translate-y-1/2 left-3 md:left-4 top-1/2 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="Mot de passe" class="w-full py-2.5 md:py-3 pl-9 md:pl-10 pr-3 border border-slate-200 rounded-md text-sm focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10 transition" required>
                </div>
                
                <div class="relative">
                 <!-- Icône à gauche -->
                 <div class="absolute -translate-y-1/2 left-3 md:left-4 top-1/2 text-slate-500">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                         <circle cx="12" cy="7" r="4"></circle>
                     </svg>
                 </div>
             
                 <!-- Select dropdown -->
                 <select name="role" class="w-full py-2.5 md:py-3 pl-9 md:pl-10 pr-10 border border-slate-200 rounded-md text-sm focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10 transition appearance-none bg-white" required>
                     <option value="" disabled selected>Sélectionnez un rôle</option>
                     <option value="user">Utilisateur</option>
                     <option value="admin">Administrateur</option>
                 </select>
             
                 <!-- Flèche de sélection à droite -->
                 <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <polyline points="6 9 12 15 18 9"></polyline>
                     </svg>
                 </div>
             </div>
             
                
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="w-4 h-4 rounded text-primary focus:ring-primary/10 border-slate-200">
                        <label for="remember" class="ml-2 text-sm text-slate-600">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="text-sm text-primary hover:underline">Mot de passe oublié?</a>
                </div>
                
                <button type="submit" class="w-full py-2.5 md:py-3 bg-primary text-white border-none rounded-md text-sm font-semibold cursor-pointer hover:bg-blue-700 transition mt-4 md:mt-6">Se connecter</button>
                
                <div class="relative flex items-center gap-3 my-5">
                    <div class="flex-grow h-px bg-slate-200"></div>
                    <div class="text-xs text-slate-400">ou continuer avec</div>
                    <div class="flex-grow h-px bg-slate-200"></div>
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="flex items-center justify-center gap-2 py-2.5 border border-slate-200 rounded-md hover:bg-slate-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span class="text-sm text-slate-600">Google</span>
                    </button>
                    
                    <button type="button" class="flex items-center justify-center gap-2 py-2.5 border border-slate-200 rounded-md hover:bg-slate-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
                        <span class="text-sm text-slate-600">GitHub</span>
                    </button>
                </div>
                
                <div class="mt-4 text-xs text-center md:text-sm text-slate-500 md:mt-6">
                    Pas encore de compte? <a href="{{ route('register') }}" class="font-medium text-primary hover:underline">S'inscrire</>
                </div>
            </form>
        </div>
    </div>
</body>
</html>