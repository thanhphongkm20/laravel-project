<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>

    @vite(['resources/css/userlist.css', 'resources/js/app.js'])
</head>

<body>
    <div class="page-wrapper">
        <div class="card">
            <div class="badge">USER LIST</div>

            <div class="list-header">
                <div>
                    <h2>People in your system</h2>
                    <p class="desc">Quickly manage users, update their details, or remove old records.</p>
                </div>

                <a href="{{ route('users.create') }}" class="primary-button">Create New User</a>
            </div>

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-card">
                <div class="table-header">
                    <span>{{ $users->count() }} users</span>
                </div>

                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? '—' }}</td>
                                <td>
                                    <div class="row-actions">
                                        <a class="ghost-button view" href="{{ route('users.show', $user->id) }}">View</a>
                                        <a class="ghost-button edit" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ghost-button delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No users found yet. Create the first user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>