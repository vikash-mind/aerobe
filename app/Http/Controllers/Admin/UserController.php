<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Hash;

class UserController extends Controller
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
            $users = User::join('user_roles', 'users.role_id', '=', 'user_roles.id')
                        ->select('users.id', 'users.name', 'users.email', 'user_roles.label', 'users.status')
                        ->get();

            return response()->json($users, 200, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        // Handle normal page load
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userRoles = UserRole::where('status', 1)->get();
        return view('admin.users.create', compact('userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'role_id' => 'required',
            'cpassword' => 'required|same:password',
        ]);

        if ($request->hasFile('image')) {

            // Upload new file
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/users/'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            'cpassword' => $request->cpassword,
            'image' => $filename, // Save path if file is uploaded
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
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
    public function edit(Request $request, User $user)
    {
        $userRoles = UserRole::where('status', 1)->get();
        return view('admin.users.edit', compact('user', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'role_id' => 'required',
            'cpassword' => 'required|same:password',
        ]);

        if ($request->hasFile('image')) {
            // Delete old file
            if ($user->image && file_exists(public_path('assets/uploads/users/' . $user->image))) {
                unlink(public_path('assets/uploads/users/' . $user->image));
            }

            // Upload new file
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/users/'), $filename);
            $user->image = $filename;
        }
        $password = Hash::make($request->password);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->password = $password;
        $user->cpassword = $request->cpassword;

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();
        if($delete == 1) {
            $success = 1;
            $message = "User Deleted Successfully!";
            
        }else{
            $message = "User not found!";
        }
        return response()->json(['success' => $success,'message' => $message,]);
    }
}
