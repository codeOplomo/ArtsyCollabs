<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use Illuminate\Http\Request;

class ArtProjectsController extends Controller
{
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
    public function destroy(string $id)
    {
        //
    }
}
