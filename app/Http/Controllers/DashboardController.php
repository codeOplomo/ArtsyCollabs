<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function assign(Request $request, $projectId)
    {

        $project = ArtProject::find($projectId);

        try {
            // Validate the request data
            $request->validate([
                'artists' => 'nullable|array',
                'partners' => 'nullable|array',
                'artists.*' => 'exists:users,id',
                'partners.*' => 'exists:partners,id',
            ]);

            // Validate that at least one artist or partner is selected
            if (empty($request->input('artists')) && empty($request->input('partners'))) {
                throw ValidationException::withMessages([
                    'artists' => 'Please select at least one artist or partner.',
                    'partners' => 'Please select at least one artist or partner.',
                ]);
            }

            // Assign artists
            if (!empty($request->input('artists'))) {
                $artists = User::find($request->input('artists'));
                $project->users()->attach($artists);
            }

            // Assign partners
            if (!empty($request->input('partners'))) {
                $partners = Partner::find($request->input('partners'));
                $project->partners()->attach($partners);
            }

            return redirect()->route('dashboard')->with('success', 'Users assigned successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }


    public function assignUser($projectId, $projectName, $projectDescription)
    {
        $project = ArtProject::find($projectId);

        $user = Auth::user();

        // Get the list of available artists (users with the 'Artist' role) not assigned to the project
        $availableArtists = User::whereHas('role', function ($query) {
            $query->where('name', 'Artist');
        })->whereNotIn('id', $project->users->pluck('id'))->get();

        // Get the list of available partners not assigned to the project
        $availablePartners = Partner::whereNotIn('id', $project->partners->pluck('id'))->get();

        return view('dashboards.assignUser', compact('project', 'availableArtists', 'user', 'availablePartners'));
    }

    public function assignPartner(Request $request, $projectId)
    {
        $project = ArtProject::find($projectId);

        // Validate the request data
        $request->validate([
            'partner_id' => 'required|exists:partners,id',
        ]);

        // Assign the partner to the project
        $partner = Partner::find($request->input('partner_id'));
        $project->partners()->attach($partner);

        return redirect()->route('dashboard.index')->with('success', 'Partner assigned successfully!');
    }

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
        $roles = Role::all();

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
