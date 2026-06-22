<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view(
            'product.index',
            compact('products')
        );
    }

    public function create()
    {
        $categories = Category::all();

        return view(
            'product.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $gambar = null;

        if($request->hasFile('gambar'))
        {
            $gambar = time().'_'.
                      $request->gambar->getClientOriginalName();

            $request->gambar->move(
                public_path('uploads'),
                $gambar
            );
        }

        Product::create([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambar
        ]);

        return redirect('/produk');
    }

    public function edit($id)
    {
        $product =
        Product::findOrFail($id);

        $categories =
        Category::all();

        return view(
            'product.edit',
            compact(
                'product',
                'categories'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $product =
        Product::findOrFail($id);

        $gambar =
        $product->gambar;

        if($request->hasFile('gambar'))
        {
            $gambar = time().'_'.
                      $request->gambar->getClientOriginalName();

            $request->gambar->move(
                public_path('uploads'),
                $gambar
            );
        }

        $product->update([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambar
        ]);

        return redirect('/produk');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)
               ->delete();

        return redirect('/produk');
    }
}