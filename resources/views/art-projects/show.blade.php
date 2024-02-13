@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="mb-0">{{ $artProject->name }}</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p class="mb-0">{{ $artProject->description }}</p>
                </div>

                <div class="mb-3">
                    <strong>Budget:</strong>
                    <p class="mb-0">{{ $artProject->budget }}</p>
                </div>

                <div class="mb-3">
                    <strong>Status:</strong>
                    <p class="mb-0">{{ $artProject->status }}</p>
                </div>

                <div class="mb-3">
                    <strong>Start Date:</strong>
                    <p class="mb-0">{{ $artProject->start_date }}</p>
                </div>

                <div class="mb-3">
                    <strong>End Date:</strong>
                    <p class="mb-0">{{ $artProject->end_date }}</p>
                </div>

                <div class="mb-3">
                    <strong>Assigned Artists:</strong>
                    <ul class="list-group">
                        @forelse ($artProject->users as $assignedArtist)
                            <li class="list-group-item">{{ $assignedArtist->name }}</li>
                        @empty
                            <li class="list-group-item">No artists assigned to this project.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="mb-3">
                    <strong>Partners:</strong>
                    <ul class="list-group">
                        @forelse ($artProject->partners as $partner)
                            <li class="list-group-item">{{ $partner->name }}</li>
                        @empty
                            <li class="list-group-item">No partners associated with this project.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- "Participate," "Pending," and "Completed" buttons -->
                <div class="mb-3 d-flex">
                    @if ($artProject->status != 'Completed')
                        @if ($artProject->users->contains(Auth::user()))
                            @if ($artProject->users->where('id', Auth::user()->id)->first()->pivot->request_status == 'Pending')
                                {{-- Display "Pending" button if the user's request is pending --}}
                                <button class="btn btn-secondary mr-3" disabled>Pending</button>
                            @else
                                {{-- If the user is already in the project, display the "Leave" button --}}
                                <form action="{{ route('leave-project', ['projectId' => $artProject->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mr-3">Leave Project</button>
                                </form>
                            @endif
                        @else
                            {{-- If the user is not in the project, display the "Participate" button --}}
                            <form action="{{ route('participate-project', ['projectId' => $artProject->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mr-3">Participate</button>
                            </form>
                        @endif
                    @else
                        {{-- Display a read-only "Completed" button if the project status is "Completed" --}}
                        <button class="btn btn-info mr-3" disabled>Completed</button>
                    @endif

                    <!-- Back to Profile button -->
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">Back to Profile</a>
                </div>


            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
