<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtProjectsController extends Controller
{

    public function acceptParticipation($userId, $projectId)
    {
        $user = User::findOrFail($userId);
        $project = ArtProject::findOrFail($projectId);
    
        // Assuming 'artProjects' is the relationship method on the User model
        $user->artProjects()->updateExistingPivot($project->id, ['request_status' => 'Accepted']);
    
        // You can redirect or return a response as needed
        return redirect()->back()->with('success', 'Participation request accepted successfully');
    }
    


    public function participateProject(Request $request, $projectId)
    {
        try {
            $user = Auth::user();
            $artProject = ArtProject::find($projectId);

            // Check if the user and art project exist
            if (!$user || !$artProject) {
                return redirect()->back()->with('error', 'Invalid user or art project');
            }

            // Check if the user is not already in the project
            if (!$artProject->users->contains($user)) {
                // Attach the user to the art project with a request status of "Pending"
                $artProject->users()->attach($user->id, ['request_status' => 'Pending']);

                return redirect()->back()->with('success', 'Participation request sent successfully');
            }

            return redirect()->back()->with('error', 'You are already in this art project');
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->back()->with('error', 'Failed to send participation request');
        }
    }

    public function leaveProject(Request $request, $projectId)
    {
        try {
            $user = Auth::user();
            $artProject = ArtProject::find($projectId);

            // Check if the user and art project exist
            if (!$user || !$artProject) {
                return redirect()->back()->with('error', 'Invalid user or art project');
            }

            // Check if the user is in the project
            if ($artProject->users->contains($user)) {
                // Detach the user from the art project
                $artProject->users()->detach($user->id);

                return redirect()->back()->with('success', 'Left the art project successfully');
            }

            return redirect()->back()->with('error', 'You are not in this art project');
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->back()->with('error', 'Failed to leave the art project');
        }
    }


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
                'status' => 'required|in:On Going,Completed,On Hold,Planning',
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
    public function show(ArtProject $artProject)
    {
        // You can pass the $artProject to the view or use it as needed
        return view('art-projects.show', compact('artProject'));
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
