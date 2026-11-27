<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Lupa Password | Flowery</title></head>
<body>
    <h1>Lupa Password</h1>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" required>
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>
</html>
