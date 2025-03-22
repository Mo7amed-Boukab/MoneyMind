@extends('layouts.master')
@section('main')
    <div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
        <div class="p-6 mx-auto lg:p-8 max-w-7xl">
         {{-- --------------------------------------- Header -------------------------------------------- --}}
            <div class="flex items-center justify-between mb-8 md:flex-row">
                <div class="mt-4 md:mt-0">
                    <h2 class="text-xl font-bold text-gray-800 md:text-2xl lg:text-3xl">Tableau de bord</h2>
                    <p class="text-sm text-gray-600 md:text-base">Bonjour, {{ Auth::user()->name }}! Voici votre situation au
                        {{ now()->format('d F Y') }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div onclick="toggleNotifications()" class="relative cursor-pointer">
                        <i class="text-xl text-gray-600 fas fa-bell"></i>
                        @if ($countNotifications > 0)
                            <div
                                class="absolute flex items-center justify-center w-4 h-4 bg-red-500 rounded-full -top-1 -right-1">
                                <span class="text-xs text-white">{{ $countNotifications }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="relative flex items-center justify-center cursor-pointer group">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-blue-950">
                                <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                            </div>
                            <div class="hidden px-4 py-2 border-b border-gray-100 lg:block">
                                <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Compte Personnel</p>
                            </div>
                        </div>
                    </div>
                    <div id="notificationList" class="fixed inset-0 z-50 hidden">
                        <div class="absolute inset-0" onclick="closeNotifications()"></div>
                        <div class="absolute right-4 top-20 w-80 bg-white rounded shadow-lg max-h-[80vh] flex flex-col">
                            <div class="flex flex-col flex-1 py-2">
                                <h3 class="px-4 py-2 text-sm font-medium text-gray-700 border-b">Notifications</h3>
                                <div class="flex-1 overflow-y-auto max-h-60">
                                    @if (count($notifications) > 0)
                                        @foreach ($notifications as $notification)
                                            <div class="block px-4 py-3 border-b border-gray-100 hover:bg-gray-50">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        @if ($notification->importance == 1)
                                                            <i class="text-red-500 fas fa-exclamation-circle"></i>
                                                        @else
                                                            <i class="text-blue-500 fas fa-info-circle"></i>
                                                        @endif
                                                    </div>
                                                    <div class="flex-1 ml-3">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            {{ $notification->titre }}</p>
                                                        <p class="text-sm text-gray-500">{{ $notification->message }}</p>
                                                        <p class="mt-1 text-xs text-gray-400">
                                                            {{ $notification->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <form action="{{ route('notifications.lu', $notification->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="ml-2 text-gray-400 hover:text-gray-600">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="px-4 py-3 text-center text-gray-500">
                                            Aucune notification pour le moment.
                                        </div>
                                    @endif
                                </div>
                                <div class="py-2 mt-auto text-center border-t">
                                    <a href="{{ route('user.notification') }}"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-800">
                                        Voir toutes les notifications
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- --------------------------------------- Statistiques --------------------------------------- --}}
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
                <div class="p-6 bg-white rounded shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-500">Solde total actuel</h3>
                        <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                            <i class="text-green-700 fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-gray-800">{{ $soldActuel }} DH</p>
                    <div class="flex items-center mt-2 text-sm text-green-700">
                        <i class="mr-1 fas fa-arrow-up"></i>
                        <span>{{ number_format((($userSalaire - $totalDepenses) * 100) / $userSalaire, 2) }}% du salaire restant</span>
                    </div>
                </div>
                <div class="p-6 bg-white rounded shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-500">Dépenses totales</h3>
                        <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                            <i class="text-red-600 fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalDepenses }} DH</p>
                    <div class="flex items-center mt-2 text-sm text-red-600">
                        <i class="mr-1 fas fa-arrow-down"></i>
                        <span>{{ number_format(($totalDepenses * 100) / $userSalaire, 2) }}% du salaire dépensé</span>
                    </div>
                </div>
                <div class="p-6 bg-white rounded shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-500">Prochain salaire</h3>
                        <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                            <i class="text-blue-600 fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-gray-800">{{ Auth::user()->salaire }} DH</p>
                    <div class="flex items-center mt-2 text-sm text-blue-600">
                        <i class="mr-1 fas fa-clock"></i>
                        <span>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $dateSalaire)->addMonth()->day - \Carbon\Carbon::now()->day }}jours restants</span>
                    </div>
                </div>
            </div>
            {{-- -------------------------------------  AI Conseil -------------------------------------- --}}
            <div class="p-4 mb-8 border-l-4 border-blue-600 rounded-lg shadow-sm bg-gradient-to-r from-blue-100 to-blue-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="text-2xl text-blue-600 fas fa-robot"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-blue-600">Suggestion de MoneyMind IA</h3>
                        <p class="text-blue-600">{{ $AiConseil }}</p>
                    </div>
                </div>
            </div>
           {{-- --------------------------------------- Charts Js ----------------------------------------- --}}
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2">
                <div class="p-6 bg-white rounded shadow-sm">
                    <h3 class="mb-4 text-lg font-medium text-gray-700">Évolution des dépenses</h3>
                    <div style="height: 300px;">
                        <canvas id="expensesEvolutionChart"></canvas>
                    </div>
                </div>
                <div class="p-6 bg-white rounded shadow-sm">
                    <h3 class="mb-4 text-lg font-medium text-gray-700">Répartition des dépenses</h3>
                    <div style="height: 300px;">
                        <canvas id="expensesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('toast')
    @if (session('update'))
        <div id="toast-edit"
            class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-600 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('update') }}</div>
            <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8"
                onclick="closeToast('toast-edit')">
                <span class="sr-only">Fermer</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
@endsection

@section('script')
   <script>

        function toggleNotifications() {
            const notificationList = document.getElementById('notificationList');
            if (notificationList.classList.contains('hidden')) {
                notificationList.classList.remove('hidden');
            } else {
                closeNotifications();
            }
        }
        function closeNotifications() {
            const notificationList = document.getElementById('notificationList');
            notificationList.classList.add('hidden');
        }
        // -----------------------------------------------------------------------
        function closeToast(id) {
            document.getElementById(id).style.display = 'none';
        }
        setTimeout(() => {
            document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
        }, 5000);

        // ------------------------------------------------------------------------
        const ctx = document.getElementById('expensesEvolutionChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Évolution des dépenses (DH)',
                    data: @json($sum),
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} DH`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Mois',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Montant dépensé (DH)',
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });

        function generateColors(array) {
            let colors = [];
            array.forEach(e => {
                let color = `#2563EB${Math.floor(Math.random() * 256).toString(16).padStart(2, '0')}`;

                colors.push(color);
            })
            return colors
        }
        const ctx2 = document.getElementById('expensesChart').getContext('2d');

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: @json($categories), // Les catégories
                datasets: [{
                    data: @json($total), // Les montants
                    backgroundColor: generateColors(
                    @json($total)), // Attribution des couleurs
                    borderColor: "#fff",
                    borderWidth: 1,
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${context.label}: ${value} DH (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
   </script>
@endsection