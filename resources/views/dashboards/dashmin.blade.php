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
                            <th scope="col">Actions</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody id="artistsTableBody">
                        @forelse ($artists as $artist)
                            <!-- Sample Row -->
                            <tr>
                                <td>{{ $artist->id }}</td>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->status }}</td>
                                <td>{{ $artist->role->name }}</td>
                                <td>{{ $artist->email }}</td>
                                <td>{{ $artist->phone }}</td>
                                <td>{{ $artist->address }}</td>
                                <td>
                                    <!-- Edit button triggering a modal -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editArtistModal_{{ $artist->id }}">Edit</button>

                                    <!-- Delete button triggering a modal or an action -->
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteArtistModal_{{ $artist->id }}">Delete</button>
                                </td>
                            </tr>

                            <!-- Add corresponding modals for edit and delete actions -->
                            <!-- Edit Artist Modal (Sample) -->
                            <div class="modal fade" id="editArtistModal_{{ $artist->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editArtistModalLabel_{{ $artist->id }}" aria-hidden="true">
                                <!-- Modal content goes here -->
                            </div>

                            <!-- Delete Artist Modal (Sample) -->
                            <div class="modal fade" id="deleteArtistModal_{{ $artist->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="deleteArtistModalLabel_{{ $artist->id }}"
                                aria-hidden="true">
                                <!-- Modal content goes here -->
                            </div>
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
                            <th scope="col">Actions</th> <!-- New column for actions -->
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
                                <td>
                                    <!-- Edit button triggering a modal -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editArtProjectModal_{{ $project->id }}"
                                        data-project-name="{{ $project->name }}"
                                        data-project-description="{{ $project->description }}">Edit</button>

                                    <!-- Delete button triggering a modal or an action -->
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteArtProjectModal_{{ $project->id }}">Delete</button>

                                    <!-- Assign button triggering a modal or an action -->
                                    <a class="btn btn-sm btn-info" href="{{ route('assign.user', ['projectId' => $project->id, 'projectName' => $project->name, 'projectDescription' => $project->description]) }}">Assign</a>

                                </td>
                            </tr>

                            <!-- Add corresponding modals for edit, delete, and assign actions -->
                            <!-- Edit Art Project Modal (Sample) -->
                            <!-- Edit button triggering a modal -->


                            <!-- Edit Art Project Modal (Sample) -->
                            <div class="modal fade" id="editArtProjectModal_{{ $project->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="editArtProjectModalLabel_{{ $project->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editArtProjectModalLabel_{{ $project->id }}">
                                                Edit Art Project</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Edit Art Project Form -->
                                            <form id="editArtProjectForm_{{ $project->id }}">
                                                <!-- Display existing project information -->
                                                <div class="mb-3">
                                                    <label for="editProjectName" class="form-label">Project Name</label>
                                                    <input type="text" class="form-control" id="editProjectName_{{ $project->id }}" name="name" value="{{ $project->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editProjectDescription"
                                                        class="form-label">Description</label>
                                                        <input type="text" class="form-control" id="editProjectDescription_{{ $project->id }}" name="description" value="{{ $project->description }}">
                                                </div>

                                                <!-- Display assigned artists -->
                                                <div class="mb-3">
                                                    <label for="assignedArtists" class="form-label">Assigned
                                                        Artists</label>
                                                    <ul id="assignedArtists">
                                                        @forelse ($project->users as $assignedArtist)
                                                            <li>
                                                                {{ $assignedArtist->name }}
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="removeAssignedArtist({{ $project->id }}, {{ $assignedArtist->id }})">
                                                                    Remove
                                                                </button>
                                                            </li>
                                                        @empty
                                                            <p>No artists assigned to this project.</p>
                                                        @endforelse
                                                    </ul>
                                                </div>


                                                <!-- Multi-select dropdown for choosing artists (non-admins) -->

                                                <div class="mb-3">
                                                    <label for="editAssignedArtists" class="form-label">Choose
                                                        Artists</label>
                                                    <div>
                                                        @php
                                                            $availableArtists = $artists->where('role.name', 'Artist')->diff($project->users);
                                                        @endphp

                                                        @if ($availableArtists->isEmpty())
                                                            <p>No artists available.</p>
                                                        @else
                                                            @foreach ($availableArtists as $artist)
                                                            <button type="button" class="btn btn-success" data-artist-id="{{ $artist->id }}" onclick="assignArtist('{{ $project->id }}', '{{ $artist->id }}', '{{ $artist->name }}')">Assign {{ $artist->name }}</button>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>


                                                <!-- Additional fields -->
                                                <div class="mb-3">
                                                    <label for="editProjectStatus" class="form-label">Status</label>
                                                    <select class="form-select" id="editProjectStatus_{{ $project->id }}" name="status">
                                                        <option value="active"
                                                            {{ $project->status === 'active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="inactive"
                                                            {{ $project->status === 'inactive' ? 'selected' : '' }}>
                                                            Inactive</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editProjectBudget" class="form-label">Budget</label>
                                                    <input type="number" class="form-control" id="editProjectBudget_{{ $project->id }}" name="budget" value="{{ $project->budget }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editProjectStartDate" class="form-label">Start
                                                        Date</label>
                                                        <input type="date" class="form-control" id="editProjectStartDate_{{ $project->id }}" name="start_date" value="{{ $project->start_date }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editProjectEndDate" class="form-label">End Date</label>
                                                    <input type="date" class="form-control" id="editProjectEndDate_{{ $project->id }}" name="end_date" value="{{ $project->end_date }}">
                                                </div>

                                                <!-- Save changes button -->
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    Save Changes
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="deleteArtProjectModal_{{ $project->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="deleteArtProjectModalLabel_{{ $project->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteArtProjectModalLabel_{{ $project->id }}">
                                                Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the art project "{{ $project->name }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-sm btn-danger" data-dismiss="modal"
                                                onclick="deleteArtProject({{ $project->id }}, 'deleteArtProjectModal_{{ $project->id }}')">Confirm
                                                Delete</button>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="assignArtProjectModal_{{ $project->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="assignArtProjectModalLabel_{{ $project->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignArtProjectModalLabel_{{ $project->id }}">
                                                Assign Artist to "{{ $project->name }}"</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Display project information here -->
                                            <p><strong>Project Name:</strong> <span
                                                    id="projectName">{{ $project->name }}</span></p>
                                            <p><strong>Description:</strong> <span
                                                    id="projectDescription">{{ $project->description }}</span></p>

                                            <!-- Display already assigned artists -->
                                            <p><strong>Assigned Artists:</strong></p>
                                            @if ($project->users->count() > 0)
                                                @foreach ($project->users as $assignedArtist)
                                                    <p>{{ $assignedArtist->name }}</p>
                                                @endforeach
                                            @else
                                                <p>No artists assigned to this project.</p>
                                            @endif

                                            <!-- Form to select an artist -->
                                            <form id="assignArtistForm_{{ $project->id }}">
                                                <!-- Populate the artist list dynamically, excluding admins and those already assigned -->
                                                <select class="form-select" name="artist_id">
                                                    @foreach ($artists->where('role.name', 'Artist') as $artist)
                                                        @if (!$project->users->contains($artist->id))
                                                            <option value="{{ $artist->id }}">{{ $artist->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                <!-- Assign button -->
                                                <button type="button" class="btn btn-sm btn-success"
                                                    data-dismiss="modal"
                                                    onclick="assignArtistToProject({{ $project->id }})">Assign</button>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="8">No art projects found.</td>
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
                                        <input type="number" class="form-control" name="budget"
                                            id="artProjectBudgetInput" placeholder="Enter budget">
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
                                        <input type="date" class="form-control" name="start_date"
                                            id="artProjectStartDateInput">
                                    </div>

                                    <div class="mb-3">
                                        <label for="artProjectEndDateInput" class="form-label">End Date</label>
                                        <input type="date" class="form-control" name="end_date"
                                            id="artProjectEndDateInput">
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
                            <td><button type="submit" name="submit" id="submitPartnerForm"
                                    class="btn btn-sm btn-success">
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

    <script>
        // Function to delete art project
        function deleteArtProject(projectId, modalId) {
            console.log('Delete function called with project ID:', projectId);
            // Perform AJAX request to delete the art project
            fetch(`/art-projects/${projectId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                        // $(`#artProjectRow_${projectId}`).remove();

                        const deleteButton = document.querySelector(`button[data-target="#${modalId}"]`);

                        if (deleteButton) {
                            const rowToDelete = deleteButton.closest('tr');

                            // Debugging logs
                            console.log('Row to delete:', rowToDelete);

                            if (rowToDelete) {
                                rowToDelete.remove();
                            }
                        }

                        // Show success message with SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    } else {
                        // Show error message with SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.error,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An unexpected error occurred.',
                    });
                });
        }

        function assignArtistToProject(projectId) {
            const artistId = document.getElementById(`assignArtistForm_${projectId}`).elements.artist_id.value;

            fetch(`/art-projects/${projectId}/assign-artist/${artistId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Handle success, e.g., show a success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    } else {
                        // Handle error, e.g., show an error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.error,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An unexpected error occurred.',
                    });
                });
        }

        // Example JavaScript code
function assignArtist(projectId, artistId, artistName) {
    // Your logic to assign the artist to the project
    console.log(`Assigning artist ${artistName} to project ${projectId}, artist ID: ${artistId}`);

    // Add the assigned artist to the UI
    var assignedArtistsList = document.getElementById('assignedArtists');
    var newArtistListItem = document.createElement('li');
    newArtistListItem.textContent = artistName;

    // Add a button to remove the assigned artist
    var removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-sm btn-danger';
    removeButton.textContent = 'Remove';
    removeButton.onclick = function() {
        removeAssignedArtist(projectId, artistId);
    };

    newArtistListItem.appendChild(removeButton);
    assignedArtistsList.appendChild(newArtistListItem);

    // Remove the "Assign" button for the assigned artist
    var assignButton = document.querySelector(`[data-artist-id="${artistId}"]`);
    if (assignButton) {
        assignButton.parentNode.removeChild(assignButton);
    }
}

    </script>
@endsection
