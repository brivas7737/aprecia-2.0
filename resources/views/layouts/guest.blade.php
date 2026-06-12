<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APRECIA 2.0</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    style="
        font-family:'Poppins',sans-serif;
        background: linear-gradient(
            135deg,
            #d90429 0%,
            #ff6b00 50%,
            #ffcc00 100%
        );
    "
>

    <div class="min-h-screen flex justify-center items-center p-4">

        <div
            class="w-full sm:max-w-md overflow-hidden"
            style="
                background:#fff8dc;
                border-radius:30px;
                padding:35px;
                box-shadow:0 20px 50px rgba(0,0,0,.30);
                border-top:8px solid #d90429;
                border-bottom:8px solid #ffcc00;
            "
        >

            {{ $slot }}

        </div>

    </div>

</body>
</html>