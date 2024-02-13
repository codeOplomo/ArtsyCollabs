<!-- resources/views/partners/artProjects.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Art Projects with {{ $partner->name }}</h1>

        <div class="row">
            @foreach ($artProjects as $artProject)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artProject->name }}</h5>
                            <p class="card-text">{{ $artProject->description }}</p>
                            <p class="card-text"><strong>Assigned Artists:</strong></p>
                            <!-- Assigned Artists -->
                            <ul>
                                @forelse ($artProject->users as $assignedArtist)
                                    <li>{{ $assignedArtist->name }}</li>
                                @empty
                                    <li>No artists assigned to this project.</li>
                                @endforelse
                            </ul>

                            <!-- View Project button -->
                            <a href="{{ route('art-projects.show', ['art_project' => $artProject->id]) }}"
                                class="btn btn-primary">View Project</a>

                            <!-- Button logic for authenticated users -->
                            @auth
                                @if ($artProject->status == 'Completed')
                                    <!-- Completed button -->
                                    <button class="btn btn-success" disabled>Completed</button>
                                @else
                                    @if (!$artProject->users->contains(Auth::user()))
                                        <!-- Participate button -->
                                        <form action="{{ route('participate-project', ['projectId' => $artProject->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Participate</button>
                                        </form>
                                    @else
                                        @if (Auth::user()->pivot && Auth::user()->pivot->request_status == 'Pending')
                                            <!-- Pending button -->
                                            <button class="btn btn-secondary" disabled>Pending</button>
                                        @elseif (Auth::user()->pivot && Auth::user()->pivot->request_status == 'Accepted')
                                            <!-- Leave button -->
                                            <form action="{{ route('leave-project', ['projectId' => $artProject->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Leave Project</button>
                                            </form>
                                        @endif
                                    @endif
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
