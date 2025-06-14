<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurPortfolio;
use App\Models\Category;
use App\Models\Country;

class OurPortfolioController extends Controller
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
            $our_portfolios = OurPortfolio::leftJoin('categories', 'categories.id', '=', 'our_portfolios.category_id')
                                            ->select(
                                                'our_portfolios.id',
                                                'our_portfolios.title',
                                                'our_portfolios.image',
                                                'categories.label',
                                                'our_portfolios.status'
                                            )
                                            ->get();

            return response()->json($our_portfolios, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.our-portfolios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.our-portfolios.create', compact('categories', 'countries'));
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
            $file->move(public_path('assets/uploads/our-portfolios/'), $imageName);
        }

        $our_portfolios = OurPortfolio::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'country_id' => json_encode($request->country_id),
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Portfolio created successfully!');
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
    public function edit(Request $request, OurPortfolio $ourPortfolio)
    {
        $countries = Country::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.our-portfolios.edit', compact('ourPortfolio', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurPortfolio $ourPortfolio)
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
            if ($ourPortfolio->image && file_exists(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image))) {
                unlink(public_path('assets/uploads/our-portfolios/' . $ourPortfolio->image));
            }

            // Upload new file
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/our-portfolios/'), $imageName);
            $ourPortfolio->image = $imageName;
        }


        $ourPortfolio->title = $request->title;
        $ourPortfolio->category_id = $request->category_id;
        $ourPortfolio->country_id = $request->country_id;
        $ourPortfolio->short_description = $request->short_description;
        $ourPortfolio->long_description = $request->long_description;
        $ourPortfolio->status = $request->status;
       
        $ourPortfolio->save();

        return redirect()->back()->with('success', 'Portfolio updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPortfolio $ourPortfolio)
    {
        $delete = $ourPortfolio->delete();
        if($delete == 1) {
            $success = 1;
            $message = "Portfolio Deleted Successfully!";
            
        }else{
            $message = "Portfolio Hub not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
