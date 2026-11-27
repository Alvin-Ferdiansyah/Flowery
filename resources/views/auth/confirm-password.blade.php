<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Konfirmasi Password | Flowery</title></head>
<body>
    <h1>Konfirmasi Password</h1>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <input type="password" name="password" required>
        <button type="submit">Konfirmasi</button>
    </form>
</body>
</html>
