<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            // Handle AJAX Request (For Grid.js, DataTables, etc.)
            $news_categories = NewsCategory::select('news_categories.id', 'news_categories.label', 'news_categories.status')
                        ->get();

            return response()->json($news_categories, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.news-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $category = NewsCategory::create([
            'label' => $request->label,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'News Category created successfully!');
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
    public function edit(Request $request, NewsCategory $newsCategory)
    {
        return view('admin.news-categories.edit', compact('newsCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $newsCategory->label = $request->label;
        $newsCategory->status = $request->status;
        $newsCategory->save();

        return redirect()->back()->with('success', 'News Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsCategory $newsCategory)
    {
        $delete = $newsCategory->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Category Deleted Successfully!";
            
        }else{
            $message = "Category not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
