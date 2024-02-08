@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/artProject.css') }}">

@section('content')
    <section class="wrapper">
        <div class="container-fostrap">
            <div>
                <img src="https://4.bp.blogspot.com/-7OHSFmygfYQ/VtLSb1xe8kI/AAAAAAAABjI/FxaRp5xW2JQ/s320/logo.png" class="fostrap-logo"/>
                <h1 class="heading">Bootstrap Card Responsive</h1>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        @foreach ($artProjects as $project)
                            <div class="col-xs-12 col-sm-4">
                                <div class="card">
                                    <a class="img-card" href="{{ $project->url }}">
                                        <img src="{{ $project->image_url }}" />
                                    </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="{{ $project->url }}">{{ $project->title }}</a>
                                        </h4>
                                        <p class="">{{ $project->description }}</p>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="{{ $project->url }}" class="btn btn-link btn-block">Read More</a>
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
@endsection
