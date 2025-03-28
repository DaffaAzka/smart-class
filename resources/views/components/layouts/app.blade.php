<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-bk5bOXLX.css') }}"> --}}
    <link rel="icon" href="{{ asset('icon.ico') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
    <title>{{ $title }}</title>
</head>
<body class="bg-gray-50">

    <livewire:navbar.navbar />

    <div class="mt-16 md:mt-10 space-y-14">



        {{ $slot }}
    </div>

    {{-- <livewire:footer /> --}}

@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset('build/assets/app-CSHKjMgd.js') }}"></script>

</body>
</html>
