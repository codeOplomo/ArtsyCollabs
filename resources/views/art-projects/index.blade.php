@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="{{ asset('css/artProject.css') }}">

@section('content')
    <section class="wrapper">
        <div class="container-fostrap">
            <div>
                <h1 class="heading">ArtsyCollabs Art Projects</h1>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        @foreach ($artProjects as $project)
                            <div class="col-xs-12 col-sm-4">
                                <div class="card">
                                    {{-- Wrap image and title in an anchor tag --}}
                                    <a class="img-card" href="{{ route('art-projects.show', ['art_project' => $project->id]) }}">
                                        <img src="{{ $project->image_url }}" />
                                    </a>
                                    <div class="card-content">
                                        {{-- Wrap title in an anchor tag --}}
                                        <h4 class="card-title">
                                            <a href="{{ route('art-projects.show', ['art_project' => $project->id]) }}">{{ $project->title }}</a>
                                        </h4>
                                        <p class="">{{ $project->description }}</p>
                                    </div>
                                    <div class="card-read-more">
                                        @if ($project->status == 'Completed')
                                            {{-- Display "Completed" button --}}
                                            <button class="btn btn-info btn-block" disabled>Completed</button>
                                        @else
                                            {{-- Render buttons based on the user's participation status --}}
                                            @if ($project->users->contains(Auth::user()))
                                                @if ($project->users->where('id', Auth::user()->id)->first()->pivot->request_status == 'Pending')
                                                    {{-- Display "Pending" button if the user's request is pending --}}
                                                    <button class="btn btn-secondary btn-block" disabled>Pending</button>
                                                @else
                                                    {{-- If the user is already in the project, display the "Leave" button --}}
                                                    <form action="{{ route('leave-project', ['projectId' => $project->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-block">Leave</button>
                                                    </form>
                                                @endif
                                            @else
                                                {{-- If the user is not in the project, display the "Participate" button --}}
                                                <form action="{{ route('participate-project', ['projectId' => $project->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-block">Participate</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $artProjects->links() }}
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
        });
    </script>
    @endif

@endsection
