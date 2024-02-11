<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function profile()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return view('dashboards.profile', compact('user'));
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $artists = User::paginate(9);
        $artProjects = ArtProject::paginate(9);
        $partners = Partner::paginate(9);
        $user = Auth::user();
        $roles =Role::all();

        // Pass the users to the view
        return view('dashboards.dashmin', compact('artists', 'artProjects', 'partners', 'user', 'roles'));
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
