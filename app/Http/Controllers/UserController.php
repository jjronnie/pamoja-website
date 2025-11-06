<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Member;
use App\Models\SavingsAccount;
use App\Mail\TemporaryPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $users = User::latest()->get();
    return view('admin.users.index', compact('users'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',

        ]);

        // 2. DATABASE TRANSACTION (Ensures atomic operations)
        try {
            DB::transaction(function () use ($validated, $request) {

                // 1. Generate a 6-digit numeric temporary password (OTP style)
                $plainPassword = (string) random_int(100000, 999999);


                // 2.2. Create User Record
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'role' => 'admin',
                    'status' => 'active',
                    'password' => Hash::make($plainPassword),
                    'must_change_password' => true,
                    'created_by' => Auth::user()->id,
                ]);

                Mail::to($user->email)->send(new TemporaryPasswordMail($user, $plainPassword));

            });
        } catch (\Exception $e) {

            // Log the error for debugging
            Log::error('User creation transaction failed: ' . $e->getMessage());

            // A generic, user-friendly error response
            return back()->with('error', 'User creation failed due to a system error. Please check logs.')->withInput();
        }

        // 3. REDIRECTION
        return redirect()->route('admin.users.index')->with('success', 'Admin Invited successfully. Temporary credentials have been emailed.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, User $user)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,superadmin',
        'status' => 'required|in:active,suspended',
    ]);

    // Update the user
    $user->update($validated);

    // Optional: flash message for success
    return redirect()->route('admin.users.index')
                     ->with('success', 'Admin updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(User $user)
{
    if (auth()->user()->role !== 'superadmin') {
        return redirect()->route('admin.users.index')
                         ->with('error', 'You do not have permission to delete admins.');
    }

    // Prevent deleting other superadmins
    if ($user->role === 'superadmin') {
        return redirect()->route('admin.users.index')
                         ->with('error', 'Cannot delete a Superadmin.');
    }

    $user->delete();

    return redirect()->route('admin.users.index')
                     ->with('success', 'Admin deleted successfully.');
}

}
