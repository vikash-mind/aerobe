<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\Category;
use App\Models\Country;

class SolutionController extends Controller
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
            $solutions = Solution::leftJoin('categories', 'categories.id', '=', 'solutions.category_id')
                                            ->select(
                                                'solutions.id',
                                                'solutions.title',
                                                'solutions.image',
                                                'categories.label',
                                                'solutions.status'
                                            )
                                            ->get();

            return response()->json($solutions, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.solutions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.solutions.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'country_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/solutions/'), $imageName);
        }

        $our_portfolios = Solution::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'country_id' => json_encode($request->country_id),
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Solutions created successfully!');
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
    public function edit(Request $request, Solution $solution)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.solutions.edit', compact('solution', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solution $solution)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'country_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete old file
            if ($solution->image && file_exists(public_path('assets/uploads/solutions/' . $solution->image))) {
                unlink(public_path('assets/uploads/solutions/' . $solution->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/solutions/'), $imageName);
            $solution->image = $imageName;
        }


        $solution->title = $request->title;
        $solution->category_id = $request->category_id;
        $solution->country_id = $request->country_id;
        $solution->short_description = $request->short_description;
        $solution->long_description = $request->long_description;
        $solution->status = $request->status;
       
        $solution->save();

        return redirect()->back()->with('success', 'Solution updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solution $solutions)
    {
        $delete = $solutions->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Solution Deleted Successfully!";
            
        }else{
            $message = "Solution Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
