<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        return view('admin.index');
    }

    public function index(Request $request)
    {

        // Attempt to render a view matching the request path
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        
        // If no matching view exists, return a 404 error page
        return view('errors.404');
    }
}
