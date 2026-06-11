<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create User</title>

    @vite(['resources/css/user.css', 'resources/js/app.js'])
</head>

<body>
    <div class="page-wrapper">
        <div class="card">
            <div class="badge">USER MANAGEMENT</div>

            <h2>Create New User</h2>
            <p class="desc">Add a new user with name, email, password and phone number.</p>

            <form
                action="{{ route('users.store') }}"
                method="POST"
                class="form-grid"
                autocomplete="off"
            >
                @csrf
                <input
                    type="text"
                    name="fake_username"
                    autocomplete="username"
                    style="display:none"
                >
                <input
                    type="password"
                    name="fake_password"
                    autocomplete="current-password"
                    style="display:none"
                >

                <div>
                    <label>Name</label>
                    <input
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter full name"
                        autocomplete="off"
                    >
                </div>

                <div>
                    <label>Email</label>
                    <input
                        name="email"
                        value="{{ old('email') }}"
                        type="email"
                        placeholder="you@example.com"
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly')"
                    >
                </div>

                <div class="grid-2">
                    <div>
                        <label>Password</label>
                        <input
                            name="password"
                            type="password"
                            placeholder="At least 8 characters"
                            autocomplete="new-password"
                        >
                    </div>

                    <div>
                        <label>Confirm Password</label>
                        <input
                            name="password_confirmation"
                            type="password"
                            placeholder="Repeat password"
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                <div>
                    <label>Phone</label>
                    <input
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Optional phone number"
                        autocomplete="off"
                    >
                </div>

                <div class="actions">
                    <a href="{{ route('users.index') }}" class="back">
                        ← Back
                    </a>
                    <button type="submit">
                        Create User →
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>