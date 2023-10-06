<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel CRUD') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
            <div class="pt-6 pb-8">
                <a href="{{ route('usercreate') }}" class="btn btn-success">Dodaj nowego użytkownika</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                        @if (session("success_user_{$user->id}"))
                            <div class="alert alert-success" id="successAlert_{{ $user->id }}">
                                {{ session("success_user_{$user->id}") }}
                                <button class="close" onclick="hideSuccessAlert({{ $user->id }})">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('useredit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Edytuj</a>
                                <a href="{{ route('useredit', ['user' => $user->id]) }}" class="btn btn-danger btn-sm">Usuń</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function hideSuccessAlert(userId) {
                var alertId = 'successAlert_' + userId;
                var alertElement = document.getElementById(alertId);
                if (alertElement) {
                    alertElement.style.display = 'none';
                }
            }
        </script>
    </x-slot>
</x-app-layout>
