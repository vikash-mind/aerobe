<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserRole;

class UserRoleController extends Controller
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
            $usersRoles = UserRole::select('user_roles.id', 'user_roles.label', 'user_roles.status')
                        ->get();

            return response()->json($usersRoles, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.user-roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user-roles.create');
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

        $userRole = UserRole::create([
            'label' => $request->label,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'User Role created successfully!');
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
    public function edit(Request $request, UserRole $userRole)
    {
        return view('admin.user-roles.edit', compact('userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRole $userRole)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $userRole->label = $request->label;
        $userRole->status = $request->status;
        $userRole->save();

        return redirect()->back()->with('success', 'User Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole)
    {
        $delete = $userRole->delete();
        if($delete == 1) {
            $success = 1;
            $message = "User Role Deleted Successfully!";
            
        }else{
            $message = "User Role not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
