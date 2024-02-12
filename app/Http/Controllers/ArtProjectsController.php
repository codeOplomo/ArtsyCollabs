<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtProjectsController extends Controller
{

    public function assignArtist($projectId, $artistId)
{
    try {
        // Retrieve the project and artist models
        $project = ArtProject::find($projectId);
        $artist = User::find($artistId);

        // Check if both models are found
        if ($project && $artist) {
            // Attach the artist to the project
            $project->artProjects()->attach($artist->id);
            
            return response()->json(['success' => true, 'message' => 'Artist assigned successfully']);
        } else {
            return response()->json(['success' => false, 'error' => 'Failed to assign artist']);
        }
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e);

        return response()->json(['success' => false, 'error' => 'Failed to assign artist']);
    }
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artProjects = ArtProject::paginate(12);
        return view('art-projects.index', compact('artProjects'));
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
                'description' => 'required|string',
                'budget' => 'required|numeric',
                'status' => 'required|in:active,inactive',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ];

            $request->validate($rules);

            $artProject = ArtProject::create($request->all());

            // Optionally, you can associate users or partners with the art project
            // $artProject->users()->sync($request->input('user_ids'));
            // $artProject->partners()->sync($request->input('partner_ids'));

            return response()->json(['success' => true, 'message' => 'Art project successfully created.', 'artProject' => $artProject]);
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
    public function destroy($id)
    {
        try {
            // Find the art project by ID
            $artProject = ArtProject::findOrFail($id);

            // Delete the art project
            $artProject->delete();

            return response()->json(['success' => true, 'message' => 'Art project deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}
