<!DOCTYPE html>
<html>
<head>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,
        th,
        td{
            border:1px solid black;
        }

        th,
        td{
            padding:8px;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<h2>
Laporan Penjualan
</h2>

<table>

<tr>

    <th>No</th>

    <th>Tanggal</th>

    <th>Kasir</th>

    <th>Total</th>

</tr>

@foreach($data as $item)

<tr>

    <td>
        {{ $loop->iteration }}
    </td>

    <td>
        {{ $item->tanggal }}
    </td>

    <td>
        {{ $item->user->name }}
    </td>

    <td>
        Rp {{ number_format($item->total,0,',','.') }}
    </td>

</tr>

@endforeach

</table>

</body>
</html>