<h1>User Detail</h1>

<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Phone: {{ $user->phone }}</p>

<a href="{{ route('users.index') }}">Back</a>