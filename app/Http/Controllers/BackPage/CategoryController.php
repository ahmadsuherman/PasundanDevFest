<?php

namespace App\Http\Controllers\BackPage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Categories';

        $categoryQuery = Category::filter(request(['search']))
                        ->latest();

        $categories = $categoryQuery->paginate(10);
        
        $data = compact('title', 'categories');
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
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'New category has been created succesfully');
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

        $category = Category::where('slug', $slug)->firstOrFail();
        
        $data = compact('title', 'category');
        return view('back-page.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $slug)
    {
        $validated = $request->validated();
        $category = Category::where('slug', $slug)->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        if(count($category->events) > 0)
        {
            return back()->with('error', 'Categories cannot be deleted! delete all event categories '. $category->name . ' first');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category has been deleted succesfully');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
