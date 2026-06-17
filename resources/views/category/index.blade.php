<h1>Data Kategori</h1>

<a href="/kategori/tambah">
    Tambah Kategori
</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>

@foreach($categories as $category)

<tr>

<td>
{{ $category->id }}
</td>

<td>
{{ $category->nama_kategori }}
</td>

<td>

<a href="/kategori/edit/{{ $category->id }}">
Edit
</a>

|

<a href="/kategori/hapus/{{ $category->id }}">
Hapus
</a>

</td>

</tr>

@endforeach

</table>