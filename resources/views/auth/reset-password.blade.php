<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Reset Password | Flowery</title></head>
<body>
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" value="{{ $email ?? '' }}" required>
        <input type="password" name="password" required>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
