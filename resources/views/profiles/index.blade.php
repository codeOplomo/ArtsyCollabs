@extends('layouts.app')

<style>
    .project-item {
        border-bottom: 1px solid #ddd;
        /* Add a border between project items */
        padding-bottom: 10px;
        /* Adjust as needed */
        margin-bottom: 10px;
        /* Adjust as needed */
        overflow: hidden;
        /* Clear float */
    }

    .status {
        float: right;
        /* Add your status styling here */
    }
</style>

@section('content')
    {{-- <div class="container">
        <h1>User Profile</h1>
        <p>This is the user profile index view. Replace this with your actual content.</p>
    </div> --}}

    <section style="background-color: #eee;">
        <div class="container py-5" style="width: 100%">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->avatar_url }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">
                                {{ optional($user->role)->id === 1 ? 'Admin' : (optional($user->role)->id === 2 ? 'Artist' : 'User Role') }}
                            </p>

                            <!-- Assuming the role or title is stored in 'role' -->
                            <p class="text-muted mb-4">{{ $user->location ?? 'User Location' }}</p>
                            <!-- Assuming location information is stored in 'location' -->
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Follow</button>
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->phone ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->mobile ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">Assignment</span> Project Status</p>
                    
                            @if ($user->artProjects && $user->artProjects->isNotEmpty())
                                @foreach ($user->artProjects as $project)
                                    @php
                                        $statusStyle = '';
                                        switch ($project->status) {
                                            case 'Completed':
                                                $statusStyle = 'background-color: #4CAF50; color: white; border-radius: 5px;';
                                                break;
                                            case 'On Going':
                                                $statusStyle = 'background-color: #2196F3; color: white; border-radius: 5px;';
                                                break;
                                            case 'On Hold':
                                                $statusStyle = 'background-color: #FF5733; color: white; border-radius: 5px;';
                                                break;
                                            case 'Planning':
                                                $statusStyle = 'background-color: #FFD700; color: black; border-radius: 5px;';
                                                break;
                                            default:
                                                // Handle other cases or set a default style
                                                break;
                                        }
                                    @endphp
                    
                                    <div class="project-item">
                                        <span class="float-start clickable" style="cursor: pointer;" onclick="window.location='{{ route('art-projects.show', ['art_project' => $project->id]) }}';">
                                            {{ $project->name }}
                                        </span>
                                        
                                        <span class="float-end status"
                                            style="{{ $statusStyle }}">{{ $project->status }}</span>
                                    </div>
                                @endforeach
                            @else
                                <p>No assigned projects</p>
                            @endif
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </section>

@endsection
