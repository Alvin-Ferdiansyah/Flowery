<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Verifikasi Email | Flowery</title></head>
<body>
    <h1>Verifikasi Email</h1>
    <p>Silakan verifikasi email Anda.</p>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Kirim ulang link verifikasi</button>
    </form>
</body>
</html>
