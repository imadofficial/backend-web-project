<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'isAdmin' => 'sometimes|boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'isAdmin' => $request->has('isAdmin') ? true : false,
        ]);

        return redirect('/admin/users')->with('success', 'User created successfully!');
    }

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent admin from removing their own admin rights
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot modify your own admin status!');
        }
        
        $user->isAdmin = !$user->isAdmin;
        $user->save();
        
        $message = $user->isAdmin ? 'User promoted to admin!' : 'Admin rights removed!';
        return redirect()->back()->with('success', $message);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent admin from deleting themselves
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account!');
        }
        
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
