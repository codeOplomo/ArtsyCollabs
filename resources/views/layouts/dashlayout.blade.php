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

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- jQuery (Slim version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <link href="{{ asset('js/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Tempus Dominus -->
    <link href="{{ asset('js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Dashboard Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
    @include('layouts.bars')

    
    
    <!-- Navbar End -->


    <div class="content">

        @yield('content')

    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",

            });
        </script>
    @endif

    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('js/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
