<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Summary | @yield('title', $page_title ?? '')</title>
    <meta name="description" content="@yield('page_description', $page_description ?? '')">

    <!-- Google Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.min.js"></script>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen flex justify-center">

    <div class="w-full h-full max-w-md md:shadow-xl">
        <!-- Header Start -->
        @if($header == true)
            @include('elements.header')
        @endif
        <!-- Header End -->

        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->

        <!-- Bottom Nav Start -->
        @if($bottom == true)
            @include('elements.bottom_nav')
        @endif
        <!-- Bottom End -->
    </div>
    

    <!-- Flowbite JS -->
    @vite('resources/js/app.js')

    <!-- Datepicker Flowbite -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
</body>
</html>