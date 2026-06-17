<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view(
            'category.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Category::create([
            'nama_kategori' =>
            $request->nama_kategori
        ]);

        return redirect('/kategori');
    }

    public function edit($id)
    {
        $category =
        Category::findOrFail($id);

        return view(
            'category.edit',
            compact('category')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $category =
        Category::findOrFail($id);

        $category->update([
            'nama_kategori' =>
            $request->nama_kategori
        ]);

        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $category =
        Category::findOrFail($id);

        $category->delete();

        return redirect('/kategori');
    }
}