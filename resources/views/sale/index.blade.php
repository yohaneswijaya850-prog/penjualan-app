<h1>Transaksi Penjualan</h1>

<form
action="/penjualan/simpan"
method="POST">

@csrf

Produk

<br>

<select name="product_id">

@foreach($products as $product)

<option value="{{ $product->id }}">

{{ $product->nama_produk }}

(Stok : {{ $product->stok }})

</option>

@endforeach

</select>

<br><br>

Qty

<br>

<input
type="number"
name="qty"
required>

<br><br>

<button type="submit">
Simpan Transaksi
</button>

</form>