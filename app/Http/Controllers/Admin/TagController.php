<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
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
            $tag = Tag::select('tags.id', 'tags.label', 'tags.status')
                        ->get();

            return response()->json($tag);
        }

        // Handle normal page load
        return view('admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
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

        $tag = Tag::create([
            'label' => $request->label,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Tag created successfully!');
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
    public function edit(Request $request, Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $tag->label = $request->label;
        $tag->status = $request->status;
        $tag->save();

        return redirect()->back()->with('success', 'Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $delete = $tag->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Tag Deleted Successfully!";
            
        }else{
            $message = "Tag not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
