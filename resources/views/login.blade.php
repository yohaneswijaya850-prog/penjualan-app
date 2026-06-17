<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form action="/login" method="POST">
    @csrf

    Email <br>
    <input type="email" name="email">
    <br><br>

    Password <br>
    <input type="password" name="password">
    <br><br>

    <button type="submit">
        Login
    </button>
</form>

</body>
</html>