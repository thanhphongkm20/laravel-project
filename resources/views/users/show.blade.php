<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - User Detail</title>
    @vite(['resources/css/user-detail.css'])
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h1>{{ $user->name }}</h1>
                <p>User Profile Information</p>
            </div>

            <!-- Body -->
            <div class="card-body">
                <!-- Name -->
                <div class="info-group">
                    <div class="info-icon">👤</div>
                    <div class="info-content">
                        <h3>Full Name</h3>
                        <p>{{ $user->name }}</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="info-group">
                    <div class="info-icon">📧</div>
                    <div class="info-content">
                        <h3>Email Address</h3>
                        <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="info-group">
                    <div class="info-icon">📱</div>
                    <div class="info-content">
                        <h3>Phone Number</h3>
                        <p>{{ $user->phone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                    Edit User
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-icon">
                    Back to Users
                </a>
            </div>
        </div>
    </div>
</body>
</html>