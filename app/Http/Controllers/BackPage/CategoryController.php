<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Categories';

        $category = Category::all();

        $data = compact('title', 'category');
        return view('back-page.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Categories';

        $data = compact('title');
        return view('back-page.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'string|required',
        //     'slug' => 'string'
        // ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $title = 'Categories';

        $data = compact('title');
        return view('back-page.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
