<h1>Dashboard Admin</h1>

<p>
Selamat datang
{{ Auth::user()->name }}
</p>

<p>
Role :
{{ Auth::user()->role }}
</p>

<a href="/logout">Logout</a>