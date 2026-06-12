<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    @vite(['resources/css/user-edit.css'])
</head>
<body>
<div class="page-wrapper">
    <div class="card">
        <div class="badge">
            USER MANAGEMENT
        </div>
        <h1>Edit User</h1>
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="desc">
            Update user information including name, email address and phone number.
        </p>
        <form
            action="{{ route('users.update', $user->id) }}"
            method="POST"
            class="form-grid"
        >
            @csrf
            @method('PUT')
            <div>
                <label>Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    placeholder="Enter full name"
                >
            </div>
            <div>
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    placeholder="example@gmail.com"
                >
            </div>
            <div>
                <label>Phone</label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $user->phone) }}"
                    placeholder="Phone number"
                >
            </div>
            <div class="actions">
                <a
                    href="{{ route('users.index') }}"
                    class="back"
                >
                    ← Back
                </a>
                <button type="submit">
                    Save Changes →
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>