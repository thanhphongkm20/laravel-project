<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </div>

    <div>
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $user->phone }}">
    </div>

    <button type="submit">Update</button>
</form>

<a href="{{ route('users.index') }}">Back</a>