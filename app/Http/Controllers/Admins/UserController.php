<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách tài khoản";
        $listUser = User::orderBy('id')->get();
        $admins = User::where('role', User::ROLE_ADMIN)->get();
        $users =  User::where('role', User::ROLE_USER)->get();
        return view('admins.contents.taikhoans.index',compact('title', 'listUser', 'admins', 'users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->findOrFail($id);
        $pages_title = "Profile tài khoản";
        return view('admins.contents.profile', compact('user', 'pages_title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showProfile(){
        $user = Auth::user();
        $pages_title = "Profile";
        return view('admins.contents.profile', compact('user', 'pages_title'));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:Admin,User'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Quyền truy cập của bạn đã được cập nhật!');
    }
    
}
