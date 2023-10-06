<x-app-layout>
    <x-slot name=slot>
    <div class="container">
        <h1 class="text-center">Dodaj nowego użytkownika</h1>
        <!-- Formularz dodawania nowego użytkownika -->
        <form action="{{ route('userstore') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Imię:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
        </form>
    </div>
    </x-slot>
</x-app-layout>
