@extends('layouts.master')
@section('main')
<div id="mainContent" class="flex-1 transition-all duration-300 lg:ml-64">
  <div class="max-w-full p-4 mx-auto lg:p-8">
   {{-- ------------------------------------- Header -------------------------------------- --}}
    <div class="mb-16">
      <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Historique des Transactions</h2>
      <p class="text-gray-600">Consultez l'ensemble de vos dépenses et revenus</p>
    </div>
   {{-- ------------------------------------- Filters ------------------------------------- --}}
    <div class="mb-6">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div>
          <label for="type" class="block mb-2 text-sm font-medium text-gray-700">Type</label>
          <form method="GET" action="{{ route('user.historique') }}">
             @if(request('mois'))
               <input type="hidden" name="mois" value="{{ request('mois') }}">
             @endif
             @if(request('annee'))
               <input type="hidden" name="annee" value="{{ request('annee') }}">
             @endif      
            <select id="type" name="type" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="all" {{ request('type') == 'all' || !request('type') ? 'selected' : '' }}>Tous</option>
              <option value="depense_recurrente" {{ request('type') == 'depense_recurrente' ? 'selected' : '' }}>Dépenses récurrentes</option>
              <option value="depense_non_recurrente" {{ request('type') == 'depense_non_recurrente' ? 'selected' : '' }}>Dépenses non récurrentes</option>
              <option value="revenu" {{ request('type') == 'revenu' ? 'selected' : '' }}>Revenus</option>
            </select>
          </form>
        </div>
        <div>
          <label for="mois" class="block mb-2 text-sm font-medium text-gray-700">Mois</label>
          <form method="GET" action="{{ route('user.historique') }}">
            @if(request('type'))
              <input type="hidden" name="type" value="{{ request('type') }}">
            @endif
            @if(request('annee'))
              <input type="hidden" name="annee" value="{{ request('annee') }}">
            @endif          
            <select id="mois" name="mois" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="all" {{ request('mois') == 'all' || !request('mois') ? 'selected' : '' }}>Tous les mois</option>
              <option value="1" {{ request('mois') == '1' ? 'selected' : '' }}>Janvier</option>
              <option value="2" {{ request('mois') == '2' ? 'selected' : '' }}>Février</option>
              <option value="3" {{ request('mois') == '3' ? 'selected' : '' }}>Mars</option>
              <option value="4" {{ request('mois') == '4' ? 'selected' : '' }}>Avril</option>
              <option value="5" {{ request('mois') == '5' ? 'selected' : '' }}>Mai</option>
              <option value="6" {{ request('mois') == '6' ? 'selected' : '' }}>Juin</option>
              <option value="7" {{ request('mois') == '7' ? 'selected' : '' }}>Juillet</option>
              <option value="8" {{ request('mois') == '8' ? 'selected' : '' }}>Août</option>
              <option value="9" {{ request('mois') == '9' ? 'selected' : '' }}>Septembre</option>
              <option value="10" {{ request('mois') == '10' ? 'selected' : '' }}>Octobre</option>
              <option value="11" {{ request('mois') == '11' ? 'selected' : '' }}>Novembre</option>
              <option value="12" {{ request('mois') == '12' ? 'selected' : '' }}>Décembre</option>
            </select>
          </form>
        </div>
        <div>
          <label for="annee" class="block mb-2 text-sm font-medium text-gray-700">Année</label>
          <form method="GET" action="{{ route('user.historique') }}">
            @if(request('type'))
              <input type="hidden" name="type" value="{{ request('type') }}">
            @endif
            @if(request('mois'))
              <input type="hidden" name="mois" value="{{ request('mois') }}">
            @endif
            
            <select id="annee" name="annee" onchange="this.form.submit()" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="all" {{ request('annee') == 'all' || !request('annee') ? 'selected' : '' }}>Toutes les années</option>
              @for ($i = \Carbon\Carbon::now()->year; $i >= \Carbon\Carbon::now()->year - 5; $i--)
                <option value="{{ $i }}" {{ request('annee') == $i ? 'selected' : '' }}>{{ $i }}</option>
              @endfor
            </select>
          </form>
        </div>
        <div class="flex items-end">
          <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
           <i class="mr-2 fas fa-download"></i>Exporter
          </a>
        </div>
      </div>
    </div>
    {{-- ------------------------------------------ Table des Transactions -------------------------------------- --}}
    <div class="p-4 bg-white rounded shadow-sm">
      <div class="overflow-x-auto">
        <table class="w-full border-collapse table-auto">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
              <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Type</th>
              <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Catégorie</th>
              <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
              <th class="px-4 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Montant</th>
            </tr>
          </thead>
          <tbody>
            @forelse($transactions as $transaction)
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($transaction['date'])->format('d/m/Y') }}</td>
              <td class="px-4 py-3 text-sm whitespace-nowrap">
                <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full {{ $transaction['class'] }} bg-opacity-10">
                  {{ $transaction['type'] }}
                </span>
              </td>
              <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ $transaction['categorie'] }}</td>
              <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">{{ $transaction['description'] }}</td>
              <td class="px-4 py-3 text-sm font-medium text-right whitespace-nowrap {{ $transaction['class'] }}">{{ number_format($transaction['montant'], 2) }} DH</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="px-4 py-3 text-sm text-center text-gray-500">Aucune transaction trouvée</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('toast')
  @if(session('success'))
  <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-500 rounded shadow-lg bottom-4 right-4 animate-slide-up">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-600 rounded">
      <i class="text-white fas fa-check"></i>
    </div>
    <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
    <button type="button" class="ml-auto text-white rounded p-1.5 hover:opacity-75 h-8 w-8" onclick="closeToast('toast-success')">
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