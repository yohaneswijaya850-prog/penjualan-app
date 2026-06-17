<h1>Edit Kategori</h1>

<form
action="/kategori/update/{{ $category->id }}"
method="POST">

@csrf

Nama Kategori

<br>

<input
type="text"
name="nama_kategori"
value="{{ $category->nama_kategori }}">

<br><br>

<button type="submit">
Update
</button>

</form>