<h1>Tambah Kategori</h1>

<form action="/kategori/simpan"
      method="POST">

@csrf

Nama Kategori

<br>

<input
type="text"
name="nama_kategori">

<br><br>

<button type="submit">
Simpan
</button>

</form>