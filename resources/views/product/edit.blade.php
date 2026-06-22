<h1>Edit Produk</h1>

<form
action="/produk/update/{{ $product->id }}"
method="POST"
enctype="multipart/form-data">

@csrf

Kategori

<br>

<select name="category_id">

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ $product->category_id == $category->id ? 'selected' : '' }}>

{{ $category->nama_kategori }}

</option>

@endforeach

</select>

<br><br>

Nama Produk

<br>

<input
type="text"
name="nama_produk"
value="{{ $product->nama_produk }}">

<br><br>

Harga

<br>

<input
type="number"
name="harga"
value="{{ $product->harga }}">

<br><br>

Stok

<br>

<input
type="number"
name="stok"
value="{{ $product->stok }}">

<br><br>

Gambar

<br>

<input
type="file"
name="gambar">

<br><br>

@if($product->gambar)

<img
src="{{ asset('uploads/'.$product->gambar) }}"
width="120">

@endif

<br><br>

<button type="submit">
Update
</button>

</form>