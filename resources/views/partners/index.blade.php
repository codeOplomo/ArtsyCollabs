@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/partner.css') }}">

@section('content')
    <div class="logo-container align-items-center justify-content-center">
        <h1 class="Logos">Our partners</h1>
        <p class="para"></p>
        <ul>
            @foreach ($partners as $partner)
                <li>
                    <div class="logo-holder {{ $partner->class }}">
                        <a href="{{ route('partner.art-projects', ['partner' => $partner->id]) }}">
                            @if (isset($partner->icon))
                                {{-- <i class="{{ $partner->icon }}"></i> --}}
                            @endif
                            <div class="left">
                                <h3>{{ $partner->name }}</h3>
                                <p>{{ $partner->description }}</p>
                            </div>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
@endsection
