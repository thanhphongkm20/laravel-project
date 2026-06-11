<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="login-page">
        <div class="login-left">

        <h1>Manage smarter</h1>

        <p>
            A simple and powerful user management system built with Laravel.
            Create, update, and organize users efficiently from one secure dashboard.
        </p>

        <div class="features">
            <div>✓ Laravel Authentication</div>
            <div>✓ CRUD Management System</div>
            <div>✓ Fast & Secure Dashboard</div>
        </div>

    </div>

        <form class="login-card" action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="logo">U</div>

            <h2>Sign in</h2>
            <p class="subtitle">Enter your account information</p>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" placeholder="admin@gmail.com" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>