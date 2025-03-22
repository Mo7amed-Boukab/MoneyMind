@extends('layouts.master')

@section('main')
    <div class="flex-1 w-full lg:ml-64">
        <div class="max-w-full p-4 mx-auto lg:p-8">
            {{-- --------------------------------------- Header ------------------------------------- --}}
            <div class="flex flex-col items-start justify-between mb-6 md:flex-row md:items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Centre de Notifications</h2>
                    <p class="text-gray-600">Restez informé des événements importants concernant la plateforme</p>
                </div>
            </div>
            {{-- ------------------------------------- Navigation ----------------------------------- --}}
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <a href="{{ route('admin.notification', ['tab' => 'all']) }}" class="inline-block p-4 {{ request('tab', 'all') == 'all' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 border-transparent' }} rounded-t-lg">
                            <i class="mr-2 fas fa-bell"></i>Toutes ({{ count($allNotifications) }})
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('admin.notification', ['tab' => 'important']) }}" class="inline-block p-4 {{ request('tab') == 'important' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                            <i class="mr-2 text-red-500 fas fa-exclamation-circle"></i>Importantes ({{ count($notificationsImportant) }})
                        </a>
                    </li>
                </ul>
            </div>
            {{-- ------------------------------ Listes des Notifications --------------------------------- --}}
            <div class="mb-8 space-y-4">
                @if (count($notifications) > 0)
                    @foreach ($notifications as $notification)
                        <div class="p-4 bg-white border-l-4 {{ $notification->importance == 1 ? 'border-red-500' : 'border-blue-500' }} rounded shadow-sm">
                            <div class="flex items-start">
                                <div class="flex items-center justify-center w-10 h-10 mr-4 {{ $notification->importance == 1 ? 'bg-red-100' : 'bg-blue-100' }} rounded-full">
                                    @if ($notification->importance == 1)
                                        <i class="text-red-600 fas fa-exclamation-circle"></i>
                                    @else
                                        <i class="text-blue-600 fas fa-info-circle"></i>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <h4 class="text-lg font-medium text-gray-800">{{ $notification->titre }}</h4>
                                        <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mb-2 text-gray-600">{{ $notification->message }}{{ $notification->importance == 1 ? '.' : '' }}</p>
                                    <div class="flex items-center justify-between">
                                        <form action="{{ route('admin.notification.lu', $notification->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                                Marquer comme lu
                                            </button>
                                        </form>
                                        <span class="px-2 py-1 text-xs font-medium {{ $notification->importance == 1 ? 'text-red-800 bg-red-100' : 'text-blue-800 bg-blue-100' }} rounded-full">
                                            {{ $notification->importance == 1 ? 'Important' : 'Information' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 text-center text-gray-500">
                        Aucune notification disponible pour le moment.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('toast')
    @if (session('update'))
    <div id="toast-edit" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-blue-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-600 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('update') }}</div>
        <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-edit')">
            <span class="sr-only">Fermer</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif
@endsection

@section('script')
<script>
   function closeToast(id) {
    document.getElementById(id).style.display = 'none';
   }
   setTimeout(() => {
    document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
   }, 5000);
</script>
@endsection 