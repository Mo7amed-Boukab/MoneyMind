<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Login/Register</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 md:flex-row">
    <div class="flex relative flex-col justify-center items-center p-6 w-full text-white md:w-1/2 bg-sidebar-blue md:p-8">
        <div class="flex absolute top-4 right-4 gap-1.5 items-center px-3 py-1.5 text-xs text-white rounded-md cursor-pointer bg-white/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
            FR
        </div>
        
        <div class="relative max-w-md text-center z-2">
            <div class="flex gap-3 items-center mb-6 md:mb-10">
                <div class="flex gap-3 items-center mb-6 md:mb-10">
                    <i class="mr-2 text-4xl text-blue-500 fas fa-wallet"></i>
                   <span class="text-3xl font-bold text-white">MoneyMind</span>
                </div>
           </div>
            
            <h1 class="mb-2 text-2xl font-bold text-white md:text-3xl md:mb-4">Gestion de budget intelligente</h1>
            <div class="mb-2 text-sm text-slate-400">Simplifiez vos finances, atteignez vos objectifs</div>
            
            <div class="grid grid-cols-2 gap-3 mt-6 w-full max-w-md md:gap-4 md:mt-10">
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex justify-center items-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Suivi des dépenses</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex justify-center items-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Dépenses récurrentes</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex justify-center items-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="text-sm font-semibold md:text-base">Objectifs d'épargne</div>
                </div>
                
                <div class="bg-[rgba(35,56,118,0.6)] p-3 md:p-5 rounded-lg flex flex-col gap-2 md:gap-3 text-left">
                    <div class="flex justify-center items-center w-8 h-8 text-white rounded-lg md:w-9 md:h-9 bg-white/10">
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

    <!-- Register Form -->
    <div class="flex flex-col justify-center items-center p-6 w-full bg-white md:w-1/2 md:p-8">
        <div class="w-full max-w-md">
            <h2 class="mb-2 text-3xl font-black text-center text-gray-800 md:text-2xl md:mb-4">Créer votre compte</h2>
            <p class="mb-6 text-sm leading-relaxed text-center text-gray-800 md:mb-8 md:text-base">Commencez votre voyage vers la liberté financière</p>

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

             <form action="{{ route('register') }}" method="POST" class="space-y-4 md:space-y-5">
                @csrf
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom complet" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Adresse email" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <input type="number" name="salaire" value="{{ old('salaire') }}" placeholder="Salaire mensuel (DH)" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <input type="number" name="date_salaire" value="{{ old('date_salaire') }}" placeholder="Jour du versement du salaire" min="1" max="31" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="Mot de passe" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <div class="relative">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 md:left-4 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" class="py-2.5 pr-3 pl-9 w-full text-sm rounded-md border transition md:py-3 md:pl-10 border-slate-200 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/10" required>
                </div>
                
                <button type="submit" class="py-2.5 mt-4 w-full text-sm font-semibold text-white rounded-md border-none transition cursor-pointer md:py-3 bg-primary hover:bg-blue-700 md:mt-6">Créer mon compte</button>
                
                <div class="mt-4 text-xs text-center md:text-sm text-slate-500 md:mt-6">
                    Vous avez déjà un compte? <a href="{{ route('login') }}" class="font-medium text-primary hover:underline">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>