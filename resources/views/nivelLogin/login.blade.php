<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
</head>
<body>
    <section>
        <h1>Login</h1>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <label>E-mail</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Senha</label>
            <input type="password" name="senha" required>

            @error('email')
                <p style="color:red">{{ $message }}</p>
            @enderror

            <button type="submit">Entrar</button>
        </form>
    </section>
</body>
</html>