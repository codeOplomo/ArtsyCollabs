@extends('layouts.dashlayout')

@section('content')
    <div class="container-fluid pt-4 px-4" id="content-container">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Sale</p>
                        <h5 class="mb-0">$1234</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h5 class="mb-0">$1234</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h5 class="mb-0">$1234</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h5 class="mb-0">$1234</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-4 px-4" id="artists-section">
        <div class="container-fluid pt-4 px-4">
            <div class="h-100 bg-light rounded p-4">


                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Add Artist</h6>
                    <button id="add-artist-button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#addArtistModal">
                        <i class="fa fa-plus"></i> Add Artist
                    </button>

                </div>


                <table class="table table-hover">
                    <colgroup>
                        <!-- Add your colgroup as per the requirements -->
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Artist Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody id="artistsTableBody">
                        @forelse ($artists as $artist)
                            <!-- Sample Row -->
                            <tr>
                                <td>{{ $artist->id }}</td>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->status }}</td>
                                <td>{{ $artist->role->name }}</td> <!-- Display the role name -->
                                <td>{{ $artist->email }}</td>
                                <td>{{ $artist->phone }}</td>
                                <td>{{ $artist->address }}</td>
                                <!-- Additional columns and actions as needed -->
                            </tr>
                        @empty
                            <!-- Handle case when no artists are available -->
                            <tr>
                                <td colspan="8">No artists found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $artists->links() }}

                <!-- Add Artist Modal -->
                <div class="modal fade" id="addArtistModal" tabindex="-1" aria-labelledby="addArtistModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addArtistModalLabel">Add Artist</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addArtistForm">
                                    <div class="mb-3">
                                        <label for="artistName" class="form-label">Artist Name</label>
                                        <input type="text" class="form-control" id="artistName" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artistEmail" class="form-label">Artist Email</label>
                                        <input type="email" class="form-control" id="artistEmail" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artistPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="artistPassword" name="password"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artistStatus" class="form-label">Status</label>
                                        <select class="form-select" id="artistStatus" name="status" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artistRole" class="form-label">Role</label>
                                        <select class="form-select" id="artistRole" name="role_id" required>
                                            <option value="" disabled selected>Select Role</option>
                                            <!-- Assuming you have roles in the database, loop through them to populate options -->
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="artistPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="artistPhone" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="artistAddress" class="form-label">Address</label>
                                        <textarea class="form-control" id="artistAddress" name="address"></textarea>
                                    </div>

                                    <!-- CSRF Token for Laravel -->
                                    @csrf

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="container-fluid pt-4 px-4" id="art-projects-section">
        <div class="container-fluid pt-4 px-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Art Projects List</h6>
                    <button id="add-art-project-button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#addArtProjecttModal"><i class="fa fa-plus"></i>
                        Add
                        Art Project</button>
                </div>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Budget</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <!-- Add other columns as necessary -->
                        </tr>
                    </thead>
                    <tbody id="artProjectsTableBody">
                        @forelse ($artProjects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <!-- Add other columns as necessary -->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No art projects found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $artProjects->links() }}

                <!-- Add Art Project Modal -->
                <div class="modal fade" id="addArtProjecttModal" tabindex="-1"
                    aria-labelledby="addArtProjecttModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addArtProjecttModalLabel">Add Art Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addArtProjectForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="artProjectNameInput" class="form-label">Project Name</label>
                                        <input type="text" class="form-control" name="name"
                                            id="artProjectNameInput" placeholder="Enter project name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="artProjectDescriptionInput" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description"
                                            id="artProjectDescriptionInput" placeholder="Enter description">
                                    </div>
                                    <div class="mb-3">
                                        <label for="artProjectBudgetInput" class="form-label">Budget</label>
                                        <input type="number" class="form-control" name="budget" id="artProjectBudgetInput" placeholder="Enter budget">
                                    </div>
                                    <div class="mb-3">
                                        <label for="artProjectStatusInput" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="artProjectStatusInput">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="artProjectStartDateInput" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="artProjectStartDateInput">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="artProjectEndDateInput" class="form-label">End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="artProjectEndDateInput">
                                    </div>
                                    
                                    
                                    <button type="submit" name="submit" class="btn btn-sm btn-success">Add <i
                                            class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-secondary"
                                        id="close-art-project-form">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid pt-4 px-4" id="partners-section">
        <div class="container-fluid pt-4 px-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Partner List</h6>
                    <button id="add-partner-button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add
                        Partner</button>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Partner Name</th>
                            <th scope="col">Contact Info</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="partnerTableBody">
                        @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->id }}</td>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->contact_info }}</td>
                                <td>{{ $partner->description }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editPartnerModal_{{ $partner->id }}">Edit</button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deletePartnerModal_{{ $partner->id }}">Delete</button>
                                </td>
                            </tr>
                            <!-- Edit Partner Modal -->
                            <div class="modal fade" id="editPartnerModal_{{ $partner->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="editPartnerModalTitle_{{ $partner->id }}"
                                aria-hidden="true">
                                <!-- Add your edit partner form here -->
                            </div>
                            <!-- Delete Partner Modal -->
                            <div class="modal fade" id="deletePartnerModal_{{ $partner->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="deletePartnerModalTitle_{{ $partner->id }}"
                                aria-hidden="true">
                                <!-- Add your delete partner confirmation message here -->
                            </div>
                        @endforeach
                    </tbody>
                </table>

                {{ $partners->links() }}

                <div id="add-partner-form" style="display: none;">
                    <form method="post" id="partnerForm">
                        @csrf
                        <tr class="form-section container-fluid">
                            <td><input type="text" class="form-control" name="name" id="partnerNameInput"
                                    placeholder="Enter partner name"></td>
                            <td><input type="text" class="form-control" name="contact_info"
                                    id="partnerContactInfoInput" placeholder="Enter contact info"></td>
                            <td><input type="text" class="form-control" name="description"
                                    id="partnerDescriptionInput" placeholder="Enter description"></td>
                            <td><button type="submit" name="submit" id="submitPartnerForm" class="btn btn-sm btn-success">
                                Add <i class="fa fa-plus"></i>
                            </button>
                            <td>
                                <button type="button" class="btn btn-secondary" id="close-partner-form">Close</button>
                            </td>
                        </tr>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="float-left col-sm-12 col-md-6 col-xl-6 mt-4">
        <div class="h-100 bg-light rounded p-4">
            <!-- Date Pickers -->
            <div class="mb-4">
                <label for="startDate" style="color: white;">Date de début:</label>
                <input type="datetime-local" id="startDate" name="startDate" class="form-control">
            </div>
            <div class="mb-4">
                <label for="endDate" style="color: white;">Date de fin:</label>
                <input type="datetime-local" id="endDate" name="endDate" class="form-control">
            </div>

            <div>
                <h6>Produits les plus performants</h6>

            </div>
        </div>
    </div>
@endsection
