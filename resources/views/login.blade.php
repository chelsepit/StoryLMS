<form method="POST" action="/login">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <input type="date" name="birthdate" required>

    <button type="submit">Login</button>

    @error('name')
        <p>{{ $message }}</p>
    @enderror
</form>
