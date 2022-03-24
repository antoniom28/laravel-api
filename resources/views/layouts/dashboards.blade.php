<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="main-container container">
        @yield('content')
    </div>

    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>
</html>