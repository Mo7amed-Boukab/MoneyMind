<form action="{{ route('user.update.salary') }}" method="POST">
    @csrf
    <label for="salaire">Salaire Mensuel:</label>
    <input type="number" name="salaire" value="{{ auth()->user()->salaire }}" required>

    <label for="date_salaire">Date de Crédit:</label>
    <input type="date" name="date_salaire" value="{{ auth()->user()->date_salaire }}" required>

    <button type="submit">Modifier</button>
</form> 