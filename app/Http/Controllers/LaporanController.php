<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Mpdf\Mpdf;

class LaporanController extends Controller
{
    public function penjualan()
    {
        $data = Sale::with('user')
                    ->orderBy('tanggal')
                    ->get();

        $html = view(
            'laporan.penjualan',
            compact('data')
        )->render();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        $mpdf->Output(
            'laporan-penjualan.pdf',
            'I'
        );
    }
}