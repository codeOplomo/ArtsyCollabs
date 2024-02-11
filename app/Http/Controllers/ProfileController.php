<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = User::where('id', auth()->user()->id)->first(); // Example: Get the logged-in user's data
    // If you have a specific user profile to display, adjust the query accordingly

    return view('profiles.index', compact('user'));
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
    try {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'status' => 'required|in:active,inactive',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ];

        $request->validate($rules);

        // Create the user without attaching the role
        $artist = User::create($request->except('role_id'));

        // Load the role relationship separately
        $role = Role::findOrFail($request->input('role_id'));
        $artist->role()->associate($role)->save();

        return response()->json(['success' => true, 'message' => 'Artist successfully created.', 'artist' => $artist]);
    } catch (ValidationException $e) {
        return response()->json(['success' => false, 'error' => $e->errors()]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
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
}
