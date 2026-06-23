<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view(
            'sale.index',
            compact('products')
        );
    }

    public function store(Request $request)
    {
       $product =
Product::findOrFail(
    $request->product_id
);

if($request->qty > $product->stok)
{
    return back()->with(
        'error',
        'Stok tidak mencukupi'
    );
}

$subtotal =
$product->harga *
$request->qty;

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'tanggal' => date('Y-m-d'),
            'total' => $subtotal
        ]);

        SaleDetail::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'qty' => $request->qty,
            'subtotal' => $subtotal
        ]);

        $product->update([
            'stok' =>
            $product->stok -
            $request->qty
        ]);

        return redirect('/penjualan');
    }
}