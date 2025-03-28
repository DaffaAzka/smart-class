<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-bk5bOXLX.css') }}"> --}}
    <link rel="icon" href="{{ asset('icon.ico') }}">
    @livewireStyles
    <title>SmartClass - Admin</title>
</head>
<body class="bg-gray-50">

    {{-- <livewire:navbar.navbar /> --}}


    <livewire:sidebar/>

    <div class="space-y-8 p-4 sm:ml-64 bg-gray-50 mt-16 md:mt-14">
        {{ $slot }}
    </div>

    {{-- <livewire:footer /> --}}

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="{{ asset('build/assets/app-CSHKjMgd.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
</body>
</html>
