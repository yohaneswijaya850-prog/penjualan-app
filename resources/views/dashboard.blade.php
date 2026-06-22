<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<h1>Dashboard Admin</h1>

<p>
Selamat datang
{{ Auth::user()->name }}
</p>

<p>
Role :
{{ Auth::user()->role }}
</p>

<hr>

<h3>Statistik</h3>

<p>
Total Kategori :
{{ $totalKategori }}
</p>

<p>
Total Produk :
{{ $totalProduk }}
</p>

<p>
Total Transaksi :
{{ $totalTransaksi }}
</p>

<hr>

<h3>Grafik Penjualan</h3>

<canvas
id="salesChart"
width="400"
height="150">
</canvas>

<script>

const labels = [

@foreach($chartData as $data)

'{{ $data->tanggal }}',

@endforeach

];

const totals = [

@foreach($chartData as $data)

{{ $data->total }},

@endforeach

];

new Chart(
document.getElementById('salesChart'),
{
type: 'bar',

data: {

labels: labels,

datasets: [

{
label: 'Jumlah Transaksi',

data: totals

}

]

}
}
);

</script>

<br>

<a href="/logout">
Logout
</a>

</body>
</html>