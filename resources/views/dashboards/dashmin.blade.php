
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WikiConnect</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- jQuery (Slim version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <!-- Popper.js Core -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (Latest version) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="../../Assets/js/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Tempus Dominus -->
    <link href="../../Assets/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="../../Assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Dashboard Styles -->
    <link href="../../Assets/css/Dashboard.css" rel="stylesheet">
    <style>
        .content-cell {
            max-width: 300px;
            /* Adjust the value as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>


</head>

<body>
    @include('layouts.sidebar')



    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="{{ url('dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-home"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <div class="align-items-center ms-auto">
                <div class="nav-item search-form-container">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="button" id="searchButton">Search</button>
                    </form>
                </div>
            </div>
        
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <!-- Messages go here -->
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notification</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <!-- Notifications go here -->
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">User-name</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Navbar End -->

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
        

        <div class="container-fluid pt-4 px-4" id="wikis-section">
            <div class="container-fluid pt-4 px-4">
                <div class="h-100 bg-light rounded p-4">
                    {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List of Artists</h6>
                        <div class="form-group">
                            <h6><label for="categoryFilter">Filter by Category:</label></h6>
                            <select class="form-control" id="categoryFilter">
                                <option value="all">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h6><label for="tagFilter">Filter by Tag:</label></h6>
                            <select class="form-control" id="tagFilter">
                                <option value="all">All Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
        
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
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
                    
                </div>
            </div>
        </div>
        


        <div class="container-fluid pt-4 px-4" id="art-projects-section">
            <div class="container-fluid pt-4 px-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Art Projects List</h6>
                        <button id="add-art-project-button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add
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
                        <tbody>
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
        
                    <div id="add-art-project-form" style="display: none;">
                        <form action="{{ route('art-projects.store') }}" method="post">
                            @csrf
                            <tr class="form-section container-fluid">
                                <td><input type="text" class="form-control" name="name" id="artProjectNameInput"
                                        placeholder="Enter project name"></td>
                                <td><input type="text" class="form-control" name="description" id="artProjectDescriptionInput"
                                        placeholder="Enter description"></td>
                                <td><input type="text" class="form-control" name="budget" id="artProjectBudgetInput"
                                        placeholder="Enter budget"></td>
                                <td><input type="text" class="form-control" name="status" id="artProjectStatusInput"
                                        placeholder="Enter status"></td>
                                <td><input type="text" class="form-control" name="start_date" id="artProjectStartDateInput"
                                        placeholder="Enter start date"></td>
                                <td><input type="text" class="form-control" name="end_date" id="artProjectEndDateInput"
                                        placeholder="Enter end date"></td>
                                <td><button type="submit" name="submit" class="btn btn-sm btn-success">
                                        Add <i class="fa fa-plus"></i>
                                    </button></td>
                                <td>
                                    <button type="button" class="btn btn-secondary" id="close-art-project-form">Close</button>
                                </td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container-fluid pt-4 px-4" id="partners-section">
            <div class="container-fluid pt-4 px-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Partner List</h6>
                        <button id="add-partner-button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Partner</button>
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
                        <tbody>
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
                                <div class="modal fade" id="editPartnerModal_{{ $partner->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editPartnerModalTitle_{{ $partner->id }}" aria-hidden="true">
                                    <!-- Add your edit partner form here -->
                                </div>
                                <!-- Delete Partner Modal -->
                                <div class="modal fade" id="deletePartnerModal_{{ $partner->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deletePartnerModalTitle_{{ $partner->id }}" aria-hidden="true">
                                    <!-- Add your delete partner confirmation message here -->
                                </div>
                            @endforeach
                        </tbody>
                    </table>
        
                    <div id="add-partner-form" style="display: none;">
                        <form action="{{ route('partners.store') }}" method="post">
                            @csrf
                            <tr class="form-section container-fluid">
                                <td><input type="text" class="form-control" name="name" id="partnerNameInput"
                                        placeholder="Enter partner name"></td>
                                <td><input type="text" class="form-control" name="contact_info" id="partnerContactInfoInput"
                                        placeholder="Enter contact info"></td>
                                <td><input type="text" class="form-control" name="description" id="partnerDescriptionInput"
                                        placeholder="Enter description"></td>
                                <td><button type="submit" name="submit" class="btn btn-sm btn-success">
                                        Add <i class="fa fa-plus"></i>
                                    </button></td>
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

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../Assets/js/chart.min.js"></script>
        <script src="../../Assets/js/lib/easing/easing.min.js"></script>
        <script src="../../Assets/js/lib/waypoints/waypoints.min.js"></script>
        <script src="../../Assets/js/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../../Assets/js/lib/tempusdominus/js/moment.min.js"></script>
        <script src="../../Assets/js/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="../../Assets/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../../Assets/js/dashboard.js"></script>


        <script src="../../Assets/js/dashboard.js"></script>
</body>

</html>