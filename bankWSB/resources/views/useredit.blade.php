<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel CRUD') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
            <h1 class="text-center">Edycja użytkownika: {{ $user->name }}</h1>

            <form action="{{ route('userupdate', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Imię</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
