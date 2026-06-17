<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>

    @vite(['resources/css/user-list.css', 'resources/js/app.js'])
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

                <div class="list-header-actions">
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <div class="notification-wrapper">
                            <button class="notification-button" id="notifBtn" aria-label="Notifications">
                                <svg class="bell-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                                @if($unreadCount > 0)
                                    <span class="notification-count">
                                        {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                                    </span>
                                @endif
                            </button>

                            <div class="notification-dropdown" id="notifDropdown">
                                <div class="notification-header">
                                    <div>
                                        <h3 class="notification-title">Notifications</h3>
                                        <span class="notification-subtitle">
                                            {{ $unreadCount }} unread notifications
                                        </span>
                                    </div>
                                    <button class="mark-all-read">Mark all read</button>
                                </div>

                                <div class="notification-list">
                                    @forelse($notifications as $notification)
                                        <div class="notification-item {{ $notification->read_at ? '' : 'unread' }}">
                                            <div class="notification-avatar">
                                                {{ strtoupper(substr($notification->data['user_name'] ?? 'U', 0, 1)) }}
                                            </div>
                                            <div class="notification-content">
                                                <div class="notification-action">
                                                    {{ $notification->data['message'] }}
                                                </div>
                                                <div class="notification-time">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            @if(!$notification->read_at)
                                                <span class="unread-dot"></span>
                                            @endif
                                        </div>
                                    @empty
                                        <div class="notification-empty">
                                            <div class="empty-icon">🔔</div>
                                            <div class="empty-title">No notifications</div>
                                            <div class="empty-desc">You're all caught up.</div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('users.create') }}" class="primary-button">Create New User</a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-card">

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

    <script>
        const notifBtn = document.getElementById('notifBtn');
        const notifDropdown = document.getElementById('notifDropdown');

        if (notifBtn && notifDropdown) {
            notifBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = notifDropdown.classList.toggle('is-open');
                notifBtn.classList.toggle('is-open', isOpen);
            });

            document.addEventListener('click', function(e) {
                if (!notifBtn.closest('.notification-wrapper').contains(e.target)) {
                    notifDropdown.classList.remove('is-open');
                    notifBtn.classList.remove('is-open');
                }
            });
        }
    </script>
</body>
</html>