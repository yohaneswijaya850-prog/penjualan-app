<h1>Tambah Produk</h1>

<form
action="/produk/simpan"
method="POST"
enctype="multipart/form-data">

@csrf

Kategori

<br>

<select name="category_id">

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->nama_kategori }}
</option>

@endforeach

</select>

<br><br>

Nama Produk

<br>

<input
type="text"
name="nama_produk">

<br><br>

Harga

<br>

<input
type="number"
name="harga">

<br><br>

Stok

<br>

<input
type="number"
name="stok">

<br><br>

Gambar

<br>

<input
type="file"
name="gambar">

<br><br>

<button type="submit">
Simpan
</button>

</form>