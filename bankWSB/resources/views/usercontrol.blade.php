<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel CRUD') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
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
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('useredit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('useredit', ['user' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <div>
                        <div class="row no-gutters fixed-top">
                            <div class="col-lg-5 col-md-12 ml-auto">
                                <div id="alert-div" role="alert">
                                    @if (session("success_user_{$user->id}"))
                                        <div class="alert alert-success">
                                            {{ session("success_user_{$user->id}") }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>

        <script>
            // Funkcja, która usunie div "alert-div" po 4 sekundach
            setTimeout(function() {
                var alertDiv = document.getElementById('alert-div');
                if (alertDiv) {
                    alertDiv.remove();
                }
            }, 4000);
        </script>
    </x-slot>
</x-app-layout>
