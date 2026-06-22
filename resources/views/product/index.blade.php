<h1>Data Produk</h1>

<a href="/produk/tambah">
    Tambah Produk
</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Kategori</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>

@foreach($products as $product)

<tr>

<td>{{ $product->id }}</td>

<td>
{{ $product->category->nama_kategori }}
</td>

<td>{{ $product->nama_produk }}</td>

<td>{{ $product->harga }}</td>

<td>{{ $product->stok }}</td>

<td>

@if($product->gambar)

<img
src="{{ asset('uploads/'.$product->gambar) }}"
width="100">

@endif

</td>

<td>

<a href="/produk/edit/{{ $product->id }}">
Edit
</a>

|

<a href="/produk/hapus/{{ $product->id }}">
Hapus
</a>

</td>

</tr>

@endforeach

</table>