<?php

namespace App\Http\Controllers;

use App\Models\ArtProject;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    // PartnerController.php

    public function artProjects(Partner $partner)
    {
        // Load the associated art projects and artists
        $artProjects = $partner->artProjects()->with('users')->get();

        return view('partners.artProjects', compact('partner', 'artProjects'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', compact('partners'));
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
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'contact_info' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            // Create a new partner with the validated data
            $partner = Partner::create($validatedData);

            // You can customize the response as needed
            return response()->json([
                'success' => true,
                'partner' => $partner,
                'message' => 'Partner created successfully', // You can customize the success message
            ]);
        } catch (\Exception $e) {
            // Handle the exception and return an error response
            return response()->json([
                'success' => false,
                'error' => 'Failed to create partner. ' . $e->getMessage(), // You can customize the error message
            ]);
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
